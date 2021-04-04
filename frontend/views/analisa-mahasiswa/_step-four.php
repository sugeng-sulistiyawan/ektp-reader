<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

\yii\web\YiiAsset::register($this);

$this->title = ' Hasil Analisa Alternatif';

$jk = Yii::$app->request->get('jk');

$uHome = Url::base(true);
$uIndex = Url::toRoute(['index', 'jk' => Yii::$app->request->get('jk')]);
$uBack = Yii::$app->request->referrer ?: $uHome;

extract($other);

$this->params['header-block'] = <<< HTML
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-9">
                        <h4 class="page-title">{$this->title}</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{$uHome}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item"><a href="{$uIndex}">Analisa Alternatif</a></li>
                            <li class="breadcrumb-item active">{$this->title}</li>
                        </ol>
                    </div>

                    <div class="col-sm-3">
                        <div class="float-right d-none d-md-block">
                            <a href="{$uBack}" class="btn btn-secondary">
                                <i class="mdi mdi-arrow-left mr-2"></i>
                                Kembali
                            </a>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row-->
            </div>
            <!-- end page title -->
        </div> <!-- end col -->
    </div> <!-- end row-->
</div>
HTML;
?>

<div class="--floating-container">
    <div class="--floating-row">
        <?php
            echo Html::a("Next <i class='fa fa-arrow-right ml-2'></i>", [''], [
                "class" => "--btn-float btn-primary btn btn-lg",
                "data-method" => "post",
            ])
        ?>
    </div>
</div>

<?php

$js = <<< JS

		$(".--floating-container").show();

		$(".--floating-container").click(function () {
			$(".--floating-container").hide();
			$("#--content").hide();
			$("#--progress").show();
		});
JS;
$this->registerJs($js);

?>

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
            
                <div id="--progress" class="py-4" style="display: none;">
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary progress-bar-striped progress-bar-animated"
                            role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                            style="width: 100%;">
                            <span class="sr-only">Loading</span>
                        </div>
                    </div>
                </div>

                <div id="--content">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <strong style="font-size:18pt;"><span class="fa fa-table"></span> Alternatif Menurut
                                Kriteria</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <form method="post">
                                <button name="hapus" class="btn btn-danger">Hapus Semua Data</button>
                            </form>
                        </div>
                    </div>
                    <br />
                    <table width="100%" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center active">Alternatif</th>
                                <th class="text-center active">Bobot</th>
                                <th class="text-center active">Peringkat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ranking = 1; foreach ($dataMahasiswa as $baris) { ?>
                            <tr>
                                <td class="active"><?= $baris['nama'] ?></td>
                                <td class="active"><?= $baris['qi'] ?></td>
                                <td class="table-primary text-center"><?=$ranking++?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>