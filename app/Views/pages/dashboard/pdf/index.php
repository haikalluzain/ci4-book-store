<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif !important;
        }

        .page-break {
            page-break-after: always;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        @page {
            margin: 10px;
        }
    </style>
    <title>CV <?= $basic_info->first_name . " " . $basic_info->last_name ?></title>
</head>
<?php

$pdf = false;

if (strpos(current_url(), 'download')) {
    $pdf = true;
}

?>

<body>
    <div class="container">
        <div class="main-content mt-4" style="border: 1px solid;padding:15px; margin:30px 0">
            <div class="justify-content-center">
                <div>
                    <!-- <h4 style="text-transform:uppercase;text-align:center">Curriculum Vitae</h4> -->
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-11">
                    <table>
                        <tr>
                            <td style="vertical-align:top;">
                                <div class="name">
                                    <h3 style="font-weight:700" class="m-0 p-0"><?= $basic_info->first_name . " " . $basic_info->last_name ?></h3>
                                    <span class="m-0 p-0" style="font-size: 20px;"><?= $basic_info->profession ?></span>
                                </div>
                                <!-- <span class="d-block"><?= $basic_info->post_code ?>,<?= $basic_info->address ?></span>
                                <span class="d-block"><?= $basic_info->division ?></span> -->
                            </td>
                            <td><span style="margin:0 80px"></span></td>
                            <td style="float:right;">
                            <h6><?= $basic_info->phone ?></h6>
                                <h6><?= $basic_info->email ?></h6>
                                <h6><?= $basic_info->website ?></h6>
                                <h6><?= $basic_info->city . ', ' . $basic_info->country ?></h6>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-11">
                    <h4>Summary</h4>
                    <hr style="border-top: 1px dotted grey">
                    <p><?= $career->career_object ?></p>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-11">
                    <h4>Experience</h4>
                    <hr style="border-top: 1px dotted grey">
                    <table>
                        <?php if (count($works) > 0) : ?>
                            <?php foreach ($works as $work) : ?>
                                <tr>
                                    <td style="vertical-align:top;">
                                        <b><?= $work->year ?></b>
                                    </td>
                                    <td style="vertical-align:top;"><span style="margin:0 10px">-</span></td>
                                    <td>
                                        <div>
                                            <b><?= $work->position ?></b>
                                            <p><?= $work->company_name ?></p>
                                            <p><?= $work->description ?></p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr class="text-center">
                                <td colspan="6" class="text-danger font-weight-bold">No data found</td>
                            </tr>

                        <?php endif; ?>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-11">
                    <h4>Education</h4>
                    <hr style="border-top: 1px dotted grey">
                    <table>
                        <?php if (count($educations) > 0) : ?>
                            <?php foreach ($educations as $education) : ?>
                                <tr>
                                    <td style="vertical-align:top;">
                                        <b><?= $education->year ?></b>
                                    </td>
                                    <td style="vertical-align:top;"><span style="margin:0 10px">-</span></td>
                                    <td>
                                        <div>
                                            <b><?= $education->degree ?></b>
                                            <p><?= $education->institute ?></p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr class="text-center">
                                <td colspan="6" class="text-danger font-weight-bold">No data found</td>
                            </tr>

                        <?php endif; ?>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-11">
                    <h4>Certificates</h4>
                    <hr style="border-top: 1px dotted grey">
                    <table style="width: 100%;">
                        <?php if (count($certificates) > 0) : ?>
                            <?php foreach ($certificates as $certificate) : ?>
                                <tr>
                                    <td style="vertical-align:top;">
                                    <b><?= $certificate->certificate_name ?></b>
                                    <p><?= $certificate->organization ?></p>
                                        
                                    </td>
                                    <td style="text-align:right">
                                        <div>
                                        <b><?= $certificate->year ?></b>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr class="text-center">
                                <td colspan="6" class="text-danger font-weight-bold">No data found</td>
                            </tr>

                        <?php endif; ?>
                    </table>
                </div>
            </div>
            <hr>
            <?php if ($pdf === false) : ?>
                <div class="row">
                    <div class="col-6">
                        <a href="<?= route_to('cv') ?>" class="btn btn-warning">Back</a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="<?= route_to('pdf-download') ?>" class="btn btn-primary">Download</a>
                    </div>
                </div>
            <?php endif; ?>
        </div> <!-- main-content -->
    </div> <!-- container -->
    <!-- ptional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>