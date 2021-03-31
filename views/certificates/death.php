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
                            <div style="text-align: center; margin-top: 50px">
                            </div>
                            <div class="title" style="text-align: center;">
                                <p><b>REPUBLIC OF KENYA</b></p>
                            </div>
                            <div class="birth-cert" style="text-align: center;">
                                <p><b>CERTIFICATE OF DEATH</b></p>
                            </div>
                            <table style="width:100%; border-style: solid; border-collapse: collapse;">
                                  <tr>
                                      <td colspan="8" style="width: 100%; border: 1px solid black;">
                                          Death in the <?=$const->ConstituencyName?> Constituency, in the <?=$county->CountyName ?> County
                                      </td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td style="border: 1px solid black;">Entry No:</td><td style="border: 1px solid black;"><?=$deceased->DeathCertificateNo?></td>
                                      <td colspan="2" style="border: 1px solid black;">Name and Surname of Deceased:</td><td td colspan="4"><?=$person->FullName?></td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td style="border: 1px solid black;">Gender:</td><td style="border: 1px solid black;"><?=$person->Gender?></td>
                                      <td style="border: 1px solid black;">Age:</td><td style="border: 1px solid black;"><?=$age?> </td>
                                      <td style="border: 1px solid black;">Occupation:</td><td td colspan="3"><?=$deceased->Occupation?></td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td style="border: 1px solid black;">Date of Death:</td><td style="border: 1px solid black;"><?=date('d-m-Y',strtotime($deceased->DateofDeath))?></td>
                                      <td colspan="1" style="border: 1px solid black;">Place of Death:</td><td><?=$const->ConstituencyName?></td>
                                      <td style="border: 1px solid black;">Residence:</td><td colspan="3"><?=$const->ConstituencyName?></td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td colspan="1" style="border: 1px solid black;">Cause of Death:</td><td colspan="7"> <?=$deceased->CauseofDeath?></td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td colspan="2" style="border: 1px solid black;">Name and Description of Informant:</td><td> Sgd.MO</td>

                                      <td style="border: 1px solid black;">Name of Registering Officer</td><td><?=$r_user->username?></td>
                                      <td style="border: 1px solid black;">Date of Registration</td><td colspan="2"><?=date('d-m-Y',strtotime($deceased->CreationDate))?></td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td colspan="8" style="width: 100%"> I <?=$a_user->username?> Constituency/ Assistant Registrar for <?=$const->ConstituencyName?> Sub County, hereby certify that this certificate is compiled from an entry/return in the country's register of Deaths.</td>
                                  </tr>
                              </table><br>
                            <div class="row pull-right" style="margin-inline-end: 20px; writing-mode: horizontal-tb; direction: rtl;">
                                <div class="col-md-12">
                                    <p>----------------------------------</p>
                                </div>
                            </div><br>
                            <div class="row text-right"> 
                                <div class="col-md-12">
                                    <p>Constituency / Assistant Registrar</p>
                                </div>
                            </div><br>
                            <div class="row" style="border-bottom: 1px solid black;"> 
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
