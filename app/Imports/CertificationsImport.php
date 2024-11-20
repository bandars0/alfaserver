<?php

namespace App\Imports;

use App\Jobs\GenerateCertificate;
use App\Models\BulkImport;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CertificationsImport implements ToArray, SkipsEmptyRows
{
    public array $data = [];
    public ?BulkImport $bulkImport = null;

    public function __construct(BulkImport $record)
    {
        $this->bulkImport = $record;
    }

    /**
     * @param Collection $collection
     */
    public function array(array $array)
    {
        if (isset($array[0])) {
            unset($array[0]);
        }
        if (!empty($array)) {
            foreach ($array as $key => $row) {
                $isMain = $this->certificateIsMain($row);
                if ($isMain) {
                    $this->data[] = $this->certificateTemplate($row);
                } else {
                    $key = array_key_last($this->data);
                    $this->data[$key]['has_sub_result'] = true;
                    $this->data[$key]['sub_result'][] = $this->certificateTemplate($row);
                }

            }
        }
        $this->proccess();
        return $this->data;
    }

    public function proccess(): void
    {
        if (!empty($this->data)) {
            foreach ($this->data as $key => $row) {
                GenerateCertificate::dispatch([
                    'importer' => $this->bulkImport->id,
                    'certificate' => $row
                ])->delay(5);
            }
            $this->bulkImport->total_count = count($this->data) ?? 0;
            $this->bulkImport->completed_count = 0;
            $this->bulkImport->is_started = true;
            $this->bulkImport->save();
        }

    }

    private function certificateIsMain($row)
    {
        if ($row[0] == '#c') {
            return true;
        }
        return false;
    }

    public function certificateTemplate($row): array
    {
        $isMain = $this->certificateIsMain($row);
        return [
            'is_main' => $isMain,
            'has_sub_result' => false,
            'sub_result' => [],
            'date_of_issue' => $row[1] ?? Carbon::now(),
            'cal_due' => $row[2] ?? Carbon::now(),
            'certificate_number' => $row[3] ?? '',
            'instrument_id' => $row[4] ?? '',
            'instrument_type' => $row[5] ?? '',
            'instrument_manufacturer' => $row[6] ?? '',
            'serial_number' => $row[7] ?? '',
            'cert_no' => $row[8] ?? '',
            'cal_date' => $row[9] ?? '',
            'cal_due_' => $row[10] ?? '',
            'sn' => $row[11] ?? '',
            'ref' => $row[12] ?? '',
            'lab_dev' => $row[13] ?? '',
            'diff' => $row[14] ?? '',
            'result' => $row[15] ?? '',
            'comments' => $row[16] ?? '',
            'Issued_to' => $row[17] ?? '',
        ];
    }
}
