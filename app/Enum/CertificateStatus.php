<?php

namespace App\Enum;

/**
 * Class CertificateStatus
 *
 * @package \App\Enum
 */
class CertificateStatus
{

    const PENDING = 'pending';
    const VALID = 'valid';
    const EXPIRED = 'expired';

    public static function getAll()
    {
        return [
            self::PENDING => self::PENDING,
            self::VALID => self::VALID,
            self::EXPIRED => self::EXPIRED
        ];
    }
    public static function getColor($status)
    {
        if ($status == self::PENDING) {
            return 'warning';
        } elseif ($status == self::VALID) {
            return 'success';
        } elseif ($status == self::EXPIRED) {
            return 'danger';
        }
    }
}
