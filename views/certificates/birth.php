<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\County;
use app\models\Constituency;
use app\models\User;

$county = County::findOne(['CountyID' => $person->CountyID]);
$const = Constituency::findOne(['ConstituencyID' => $person->ConstituencyID]);
$r_user = User::findOne($person->CreatedBy);
$a_user = User::findOne(Yii::$app->user->identity->id);


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
                                <p><b>CERTIFICATE OF BIRTH</b></p>
                            </div>
                             <table style="width:100%; border-style: solid; border-collapse: collapse;">
                                  <tr>
                                      <td colspan="6" style="width: 100%; border: 1px solid black;">
                                          Birth in the <?=$const->ConstituencyName?> Constituency, in the <?=$county->CountyName ?> County
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="border: 1px solid black;">Entry No:</td><td style="border: 1px solid black;"><?=$person->BirthCertNo ?></td>
                                      <td style="border: 1px solid black;">Where born</td><td style="border: 1px solid black;"><?=$const->ConstituencyName?></td>
                                      <td style="border: 1px solid black;">Name:</td><td style="border: 1px solid black;"><?=$person->FullName?></td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td style="border: 1px solid black;">Date of Birth:</td><td style="border: 1px solid black;"><?=date('d-m-Y',strtotime($person->DateofBirth))?></td>
                                      <td style="border: 1px solid black;">Gender:</td><td style="border: 1px solid black;"><?=$person->Gender?></td>
                                      <td style="border: 1px solid black;">Name of Father:</td><td><?=$person->FathersName?></td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td colspan="2" style="border: 1px solid black;">Name and Maiden, Name of Mother:</td><td colspan="4"><?=$person->MothersName?></td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td colspan="2" style="border: 1px solid black;">Name and Description of Informant:</td><td colspan="4"> Sgd Parent </td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td style="border: 1px solid black;">Name of Registering Officer</td><td><?=$r_user->username?></td>
                                      <td style="border: 1px solid black;">Date of Registration</td><td colspan="3"><?=date('d-m-Y',strtotime($person->CreatedDate)) ?></td>
                                  </tr>
                                  <tr style="border: 1px solid black;">
                                      <td colspan="6" style="width: 100%">I <?=$a_user->username?> Constituency/ Assistant Registrar for <?=$const->ConstituencyName?> Sub County, hereby certify that this certificate is compiled from an entry/return in the country's register of births.</td>
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
                            <h4><b>Note: A Certificate of Birth is not Proof of Kenyan Citizenship</b></h4>
                        </div><!--end thinner border-->
                    </div><!--thin-->
                </div><!--outer thick border-->

            </section>
        </div>
    </div>
</div>
</div>
