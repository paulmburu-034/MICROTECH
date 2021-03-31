<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\DeathDetails;
use app\models\County;
use app\models\Constituency;
use app\models\User;

$deceased = DeathDetails::findOne(['PersonID' => $person->BirthCertNo]);
$county = County::findOne(['CountyID' => $deceased->CountyID]);
$const = Constituency::findOne(['ConstituencyID' => $deceased->ConstituencyID]);
$r_user = User::findOne($deceased->CreatedBy);
$a_user = User::findOne(Yii::$app->user->identity->id);

$born = $person->DateofBirth;
$dead = $deceased->DateofDeath;

$diff = abs(strtotime($dead)-strtotime($born));

$years = floor($diff / (365*60*60*24));

$months = floor($diff / (30*60*60*24));

$days = floor($diff / (60*60*24));

if ($years > 0) {
  # code...
  $age = $years.' Years';

}elseif ($years < 0) {
  # code...
  if ($months > 0) {
    # code...
    $age = $months.' Months';
  }else{
    $age = $days.' Days';
  }
}
?>
<div class="app-content content">
    <div class="content-header row"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <section class="flexbox-container">

                <div class="public-birth-summary" style="margin-bottom: 50px"><!--outer thicker border-->
                    <div class="thin"><!--thin-->
                        <div class="thinner"><!--thinner border-->
                            <div >

                            </div>
                            <div style="text-align: center; margin-top: 50px">
                            </div>
                            <div class="title" style="text-align: center;">
                                <p><b>REPUBLIC OF KENYA</b></p>
                            </div>
                            <div class="birth-cert" style="text-align: center;">
                                <p><b>CERTIFICATE OF DEATH</b></p>
                            </div>
                            <div class="row" style="border: solid;">
                                <p>Death in the <?=$const->ConstituencyName?> Constituency, in the <?=$county->CountyName ?> County </p>
                            </div>
                            <div class="row" style="border-right: solid;border-bottom: solid;">
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Entry No : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p><?=$deceased->DeathCertificateNo?></p>
                                </div>
                                <div class="col-md-3" style="border-left: solid;">
                                    <p>Name and Surname of Deceased : </p>
                                </div>
                                <div class="col-md-3" style="border-left: solid;">
                                    <p><?=$person->FullName?></p>
                                </div>
                            </div>
                            <div class="row" style="border-right: solid;border-bottom: solid;">
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Gender : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p><?=$person->Gender?></p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Age : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p><?=$age?></p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Occupation : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p><?=$deceased->Occupation?></p>
                                </div>
                            </div>
                            <div class="row" style="border-right: solid;border-bottom: solid;">
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Date of Death : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p><?=date('d-m-Y',strtotime($deceased->DateofDeath))?></p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Place of Death : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p><?=$const->ConstituencyName?></p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Residence : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p><?=$const->ConstituencyName?></p>
                                </div>
                            </div>
                            <div class="row" style="border-right: solid;border-bottom: solid;">
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Cause of Death : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p><?=$deceased->CauseofDeath?></p>
                                </div>
                            </div>
                            <div class="row" style="border-right: solid;border-bottom: solid;">
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Name and Description of Informant : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Sgd MO</p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Name of Registering Officer : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p><?=$r_user->username?></p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p>Date of Registration : </p>
                                </div>
                                <div class="col-md-2" style="border-left: solid;">
                                    <p><?=date('d-m-Y',strtotime($deceased->CreationDate))?></p>
                                </div>
                            </div>
                            <div class="row" style="border-right: solid;border-bottom: solid;">
                                <div class="col-md-12" style="border-left: solid;">
                                    <p> I <?=$a_user->username?> Constituency/ Assistant Registrar for <?=$const->ConstituencyName?> Sub County, hereby certify that this certificate is compiled from an entry/return in the country's register of Deaths.</p>
                                </div>
                            </div> <br>
                            <div class="row pull-right">
                                <div class="col-md-12">
                                    <p>----------------------------------</p>
                                </div>
                            </div><br>
                            <div class="row text-right"> 
                                <div class="col-md-12">
                                    <p>Constituency / Assistant Registrar</p>
                                </div>
                            </div><br>
                            <div class="row" style="border-bottom: solid;"> 
                                <div class="col-md-12">
                                    <p>Given under the seal of Principal Civil Registrar on the <?= date('d-m-Y') ?></p>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-12">
                                    <p>This certificate is issued in pursuance of the Births and Deaths Registration Act (Cap. 149) which provides that a certified copy of any entry in any register or return purporting to be sealed or stamped with the seal of the Principal Registrar shall be received as evidence of the dates and facts therein contained without any or other proof of such entry.</p>
                                </div>
                            </div>
                        </div><!--end thinner border-->
                    </div><!--thin-->
                </div><!--outer thick border-->

            </section>
        </div>
    </div>
</div>
</div>
