<!doctype html>
<html lang="en">
<?php
$cert = $row;
$cert_data = $cert->certificate_data;
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.5, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{--<link href="https://fonts.googleapis.com/css2?family=Calibri:wght@300;400;600;400;700&display=swap" rel="stylesheet">--}}
    <title>{{$cert_data['certificate_number']}}</title>
    <style type="text/css">
        * {
            font-family: "Calibri", 'Arial';
        }

        /*    .cn_data {
                width: 691px!important;
                right: 20px;
            }*/
        html ,body{
            margin: 0px!important;
            padding: 0px!important;
            width: 100% !important;
        }

        table {
            width: 100% !important;
        }

        .header_ {
            position: fixed;
            top: 5px;
            left: 0px;
            right: 0px;
            bottom: 10px;
            width:100%;
            text-align: center;
            line-height: 35px;
        }

        .footer_ {
            position: fixed;
            bottom: 0px;
            left: -38px;
            right: 0px;
            height: 90px;
            width: 100%;
            text-align: center;
            line-height: 35px;
        }
    </style>

</head>
<body>

<div class="col-xs-12">
    <div class="cn_data">
        <div class="WordSection1">
            <img class="header_" src="data:image/png;base64,{{$header}}"  width="100%">
            <br>
            <br>
            <br>
            <br>
            <br>
            <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0">

                <tbody>
                <tr style="height:24.9pt">
                    <td width="482" style="width:361.25pt;border-top:solid windowtext 1.0pt;
  border-left:solid windowtext 1.0pt;border-bottom:none;border-right:none;
  padding:0in 5.4pt 0in 5.4pt;height:24.9pt">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="font-size:16.0pt;color:#0F243E">CALIBRATION
  CERTIFICATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></b>
                        </p>
                    </td>
                    <td width="180" nowrap="" style="width:134.65pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:24.9pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="color:black">Certificate Number:</span></b></p>
                    </td>
                </tr>
                <tr style="height:15.0pt">
                    <td width="482" style="width:361.25pt;border:none;border-left:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="color:black">&nbsp;</span></b>
                        </p>
                    </td>
                    <td width="180" style="width:134.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black;">{{$cert->number}}</span></b></p>
                    </td>
                </tr>
                <tr style="height:15.0pt">
                    <td width="482" style="width:361.25pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;padding:0in 5.4pt 0in 5.4pt;
  height:15.0pt">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="font-size:12.0pt;color:black">Date of Issue:  <span
                                        style=" ">{{$cert_data['date_of_issue']}}</span>   – Cal Due: <span
                                        style="  "></span>{{$cert_data['cal_due']}} </span></b></p>
                    </td>
                    <td width="180" style="width:134.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.0pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black">Page 1 of 2
  </span></b></p>
                    </td>
                </tr>
                </tbody>
            </table>

            <p class="MsoNormal"><span style="font-size:5.0pt;line-height:107%">&nbsp;</span></p>

            <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0"
                   style="border-collapse:collapse;border:none">
                <tbody>
                <tr style="height:.25in">
                    <td width="141" valign="top" style="width:106.1pt;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="font-size:12.0pt;color:black">Customer/ Owner</span></b></p>
                    </td>
                    <td width="520" nowrap="" colspan="5" style="width:389.85pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="font-size:12.0pt;color:black;  ">{{$cert->Issued_to}}</span></b><b><span
                                    style="font-size:12.0pt;color:black"> </span></b></p>
                    </td>
                    <td style="height:.25in;border:none" width="0" height="24"></td>
                </tr>
                <tr style="height:.25in">
                    <td width="141" rowspan="3" valign="top" style="width:106.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="color:black">Instrument / Device</span></b>
                        </p>
                    </td>
                    <td width="104" nowrap="" style="width:77.95pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:.25in">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="color:black">ID No: </span></b>
                        </p>
                    </td>
                    <td width="416" nowrap="" colspan="4" style="width:311.9pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="font-size:12.0pt;color:black;  ">{{$cert_data['instrument_id'] ?$cert_data['instrument_id'] :''}}</span></b>
                        </p>
                    </td>
                    <td style="height:.25in;border:none" width="0" height="24"></td>
                </tr>
                <tr style="height:.25in">
                    <td width="104" nowrap="" style="width:77.95pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:.25in">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="color:black">Description: </span></b>
                        </p>
                    </td>
                    <td width="416" nowrap="" colspan="4" style="width:311.9pt;border:none;border-right:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="font-size:12.0pt;color:black;  ">{{$cert_data['instrument_type']}}</span></b>
                        </p>
                    </td>
                    <td style="height:.25in;border:none" width="0" height="24"></td>
                </tr>
                <tr style="height:.25in">
                    <td width="104" nowrap="" style="width:77.95pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="color:black">Manufacturer:</span></b>
                        </p>
                    </td>
                    <td width="416" nowrap="" colspan="4" style="width:311.9pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><span
                                style="color:black">&nbsp;</span><b><span
                                    style="font-size:12.0pt;color:black;
    ">{{$cert_data['instrument_manufacturer']}}</span></b></p>
                    </td>
                    <td style="height:.25in;border:none" width="0" height="24"></td>
                </tr>
                <tr style="height:22.5pt">
                    <td width="141" nowrap="" rowspan="2" style="width:106.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:22.5pt">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="color:black">Reference</span></b>
                        </p>
                    </td>
                    <td width="520" colspan="5" rowspan="2" style="width:389.85pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:22.5pt">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><span
                                style="color:black">This Calibration and/ or verification was carried out in
  accordance with manufacturer manual</span></p>
                    </td>
                    <td style="height:22.5pt;border:none" width="0" height="30"></td>
                </tr>
                <tr style="height:22.5pt">
                    <td style="height:22.5pt;border:none" width="0" height="30"></td>
                </tr>
                <tr style="height:20.1pt">
                    <td width="141" style="width:106.1pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="color:black">Environmental Conditions</span></b>
                        </p>
                    </td>
                    <td width="520" nowrap="" colspan="5" style="width:389.85pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><span
                                style="color:black">Temperature: 20.0 °C</span>
                        </p>
                    </td>
                    <td style="height:20.1pt;border:none" width="0" height="27"></td>
                </tr>
                <tr style="height:20.1pt">
                    <td width="245" nowrap="" colspan="2" style="width:184.05pt;border:none;border-bottom:
  solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><i><span
                                    style="font-size:8.0pt;color:black">&nbsp;</span></i></p>
                    </td>
                    <td width="123" nowrap="" style="width:92.15pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><i><span style="color:black">&nbsp;</span></i></b></p>
                    </td>
                    <td width="123" nowrap="" style="width:92.1pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><i><span style="color:black">&nbsp;</span></i></b></p>
                    </td>
                    <td width="85" nowrap="" style="width:63.8pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><i><span style="color:black">&nbsp;</span></i></b></p>
                    </td>
                    <td width="85" nowrap="" style="width:63.85pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><i><span style="color:black">&nbsp;</span></i></b></p>
                    </td>
                    <td style="height:20.1pt;border:none" width="0" height="27"></td>
                </tr>
                <tr style="height:20.1pt">
                    <td width="245" nowrap="" colspan="2" style="width:184.05pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><i><span
                                        style="color:black">Instrument Description</span></i></b></p>
                    </td>
                    <td width="123" nowrap="" style="width:92.15pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><i><span style="color:black">Serial No:</span></i></b></p>
                    </td>
                    <td width="123" nowrap="" style="width:92.1pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><i><span style="color:black">Cert No:</span></i></b></p>
                    </td>
                    <td width="85" nowrap="" style="width:63.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><i><span style="color:black">Cal Date</span></i></b></p>
                    </td>
                    <td width="85" nowrap="" style="width:63.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><i><span style="color:black">Cal Due</span></i></b></p>
                    </td>
                    <td style="height:20.1pt;border:none" width="0" height="27"></td>
                </tr>
                <tr style="height:20.1pt">
                    <td width="245" nowrap="" colspan="2" style="width:184.05pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="font-size:12.0pt;color:black;  ">{{$cert_data['instrument_type']}}</span></b>
                        </p>
                    </td>
                    <td width="123" nowrap="" style="width:92.15pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black; ">{{$cert_data['serial_number']}}</span></b></p>
                    </td>
                    <td width="123" nowrap="" style="width:92.1pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black; ">{{$cert_data['cert_no']}}</span></b></p>
                    </td>
                    <td width="85" nowrap="" style="width:63.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black; ">{{$cert_data['cal_date']}}</span></b></p>
                    </td>
                    <td width="85" nowrap="" style="width:63.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.1pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black; ">{{$cert_data['cal_due_']}}</span></b></p>
                    </td>
                    <td style="height:20.1pt;border:none" width="0" height="27"></td>
                </tr>
                </tbody>
            </table>


            <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0"
                   style="border-collapse:collapse;border:none; width: 100%">
                <tbody>
                <tr style="height:.5in" width="740">
                    <td colspan="10" style="width:100%;border:solid windowtext 1.0pt;
  border-bottom:none;padding:0in 5.4pt 0in 5.4pt;height:.5in">
                        <p class="MsoNormal" style="margin-bottom:0in;text-align:justify;line-height:
  normal"><b><span style="font-size:12.0pt;color:black">This Instrument was
  calibrated using instruments traceable to National Institute <br>of Standards and
  Technology.</span></b></p>
                        <p class="MsoNormal" style="margin-bottom:0in;text-align:justify;line-height:
  normal"><span lang="AR-SA" dir="RTL" style="font-size:12.0pt;color:black">&nbsp;</span></p>
                        <p class="MsoNormal" style="margin-bottom:0in;text-align:justify;line-height:
  normal"><span style="font-size:12.0pt;color:black">This Calibration
  certificate applies only to the instrument or device described above <br> and the
  measurement results are recorded on the following pages.</span></p>
                    </td>
                    <td style="height:.5in;border:none" width="0" height="48"></td>
                </tr>
                <tr style="height:23.8pt">
                    <td width="740" colspan="10" rowspan="2" style="width:490.9pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:23.8pt">
                        <p class="MsoNormal" style="margin-bottom:0in;text-align:justify;line-height:
  normal"><span style="font-size:12.0pt;color:black">The estimated measurement uncertainty
  (if specified) is based on a standard uncertainty multiplied <br> by a coverage
  factor k=2, providing a level of confidence of approximately 95%.</span></p>
                    </td>
                    <td style="height:23.8pt;border:none" width="0" height="32"></td>
                </tr>
                <tr style="height:22.5pt">
                    <td style="height:22.5pt;border:none" width="0" height="30"></td>
                </tr>
                <tr style="height:.25in">
                    <td width="262" style="width:193.85pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><span style="font-size:12.0pt;color:black">&nbsp;</span></p>
                    </td>
                    <td width="254" style="width:190.55pt;border:none;border-bottom:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><span style="font-size:12.0pt;color:black">&nbsp;</span></p>
                    </td>
                    <td width="181" nowrap="" colspan="2" style="width:135.5pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:.25in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black">&nbsp;</span></b></p>
                    </td>
                    <td style="height:.25in;border:none" width="0" height="24"></td>
                </tr>
                <tr style="height:.25in">
                    <td width="226" style="width:169.85pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black">Seal</span></b></p>
                    </td>
                    <td width="254" style="width:190.55pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.25in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><span style="font-size:12.0pt;color:black">&nbsp;</span></p>
                    </td>
                    <td width="181" nowrap="" colspan="2" style="width:135.5pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:.25in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black">&nbsp;</span></b></p>
                    </td>
                    <td style="height:.25in;border:none" width="0" height="24"></td>
                </tr>
                <tr style="height:84.65pt">
                    <td width="226" style="width:169.85pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0in 5.4pt 0in 5.4pt;height:84.65pt; padding: 5px; text-align: center; margin-top: 9px;">
                        <br>
                        <img width="162" height="148"
                             src="data:image/png;base64,{{$logo}}">
                    </td>
                    <td width="254" valign="bottom" style="width:190.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:84.65pt; text-align: center;">
                        <img src="data:image/png;base64,{{$qrcode}}" width="100" style="padding: 5px" height="100"><br>
                        <span style="font-size:10.0pt;color:black">Scan this
  code   for verification</span>
                        </b></p>
                    </td>
                    <td width="57" nowrap="" valign="bottom" style="width:42.6pt;border:none;padding:
  0in 5.4pt 0in 5.4pt;height:84.65pt"></td>
                    <td width="124" nowrap="" style="width:92.9pt;border:none;padding:0in 5.4pt 0in 5.4pt;
  height:84.65pt"></td>
                    <td style="height:84.65pt;border:none" width="0" height="113"></td>
                </tr>
                </tbody>
            </table>
            <br>
            <p class="MsoNormal" align="center" style="text-align:center"><b><span style="color:red; font-size: 10px;">This certificate and accompanying reports shall not be
reproduced except in full, without the written approval of the Masheej Medical
LLC.</span></b></p>


            <img style="right: 10px" src="data:image/png;base64,{{$footer}}"  class="footer_" width="110%">

        </div>
        <div class="WordSection2">
            <p class="MsoNormal" align="center" style="text-align:center"><b><span
                        style="font-size:8.0pt;line-height:107%;color:red">&nbsp;</span></b></p>



            <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0"
                   style="border-collapse:collapse">
                <tbody>
                <tr style="height:27.0pt">
                    <td width="661" nowrap="" colspan="6" style="width:495.9pt;border:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:27.0pt">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:14.0pt;color:black">Calibration
  Data</span></b></p>
                    </td>
                </tr>
                <tr style="height:.2in">
                    <td width="34" nowrap="" style="width:.35in;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.2in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black">No</span></b></p>
                    </td>
                    <td width="173" nowrap="" style="width:1.8in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.2in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black">SN</span></b></p>
                    </td>
                    <td width="72" nowrap="" style="width:53.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.2in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black">REF</span></b></p>
                    </td>
                    <td width="161" nowrap="" style="width:120.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.2in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black">LAB DEV.</span></b></p>
                    </td>
                    <td width="91" nowrap="" style="width:68.55pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.2in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black">DIFF.</span></b></p>
                    </td>
                    <td width="131" nowrap="" style="width:97.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:.2in">
                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black">RESULT</span></b></p>
                    </td>
                </tr>
                @if ($result)
                    @php
                        $count = 0;
                    @endphp
                    @foreach($result as $res)
                        @php
                            $count++;
                        @endphp
                        <tr style="height:17.0pt">
                            <td width="34" nowrap="" style="width:.35in;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:17.0pt">
                                <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><span style="font-size:12.0pt;color:black">{{$count}}</span></p>
                            </td>
                            <td width="173" nowrap="" style="width:1.8in;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:17.0pt">
                                <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black; ">{{$res['sn']}}</span></b></p>
                            </td>
                            <td width="72" nowrap="" style="width:53.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:17.0pt">
                                <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black; ">{{$res['ref']}}</span></b></p>
                            </td>
                            <td width="161" nowrap="" style="width:120.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:17.0pt">
                                <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black; ">{{$res['lab_dev']}}</span></b></p>
                            </td>
                            <td width="91" nowrap="" style="width:68.55pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:17.0pt">
                                <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black; ">{{$res['diff']}}</span></b></p>
                            </td>
                            <td width="131" nowrap="" style="width:97.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:17.0pt">
                                <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:12.0pt;color:black; ">{{$res['result']}}</span></b></p>
                            </td>
                        </tr>
                    @endforeach
                @endif
                <tr style="height:1.4in">
                    <td width="439" nowrap="" colspan="4" valign="top" style="width:329.45pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:1.4in">
                        <p class="MsoNormal" style="margin-bottom:0in;line-height:normal"><b><span
                                    style="font-size:12.0pt;color:black">Comments</span></b><span
                                style="font-size:12.0pt;color:black">: <b><span style="  ">
                                        {{$cert_data['comments']}}
                                    </span></b></span></p>
                    </td>
                    <td width="222" nowrap="" colspan="2" valign="bottom" style="width:166.45pt; text-align: center;
  border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;
  border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:1.4in">
                        <img src="data:image/png;base64,{{$qrcode}}" width="100" style="padding: 10px" height="100"><br>

                        <p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
  line-height:normal"><b><span style="font-size:10.0pt;color:black">Scan this
  code for verification</span></b></p>
                    </td>
                </tr>
                </tbody>
            </table>

            <p class="MsoNormal" align="center" style="text-align:center"><span style="color:red">&nbsp;</span>
            </p>

            <p class="MsoNormal" align="center" style="text-align:center"><b><span
                        style="font-size:12.0pt;line-height:107%;color:black">End of Report</span></b></p>




        </div>
    </div>
</div>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>
