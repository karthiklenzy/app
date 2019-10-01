<?php
include_once ('top.php');
include_once DOC_ROOT.'mpdf60/mpdf.php';

class pdf_create {

    function pdf_gen($pay_id, $student_id, $student_name, $student_level, $payment_date, $receipt_number, $semester, $month, $payment_type, $amount, $comments, $user_name, $branch_address, $branch_email) {


        /* Define a default page size/format by array - A4 page will be 190mm wide x 236mm height */
        $mpdf=new mPDF('utf-8', array(190,118), '', 'Gotham Sans', '5','3','3','3');

        $filename = $student_name." receipt ".$receipt_number;
        $mpdf->SetTitle($filename);
        $mpdf->AddPage();

        $contents = '
                    <style>
                      .tbldetails {
                        font-size: 12px;
                      }
                      .tbldetails tr:nth-child(even) { background: #eee; }
                      .footertable { font-size: 11px; }
                    </style>

                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td>RECEIPT # '.$receipt_number.'</td>
                        <td width="60%">&nbsp;</td>
                        <td><img src="'.HTTP_PATH.'images/esol_logo.jpg" width="80px" style="float:right;" /></td>
                      </tr>
                    </table>

                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td width="30%"><img src="'.HTTP_PATH.'images/dots.png" width="130px"/></td>
                        <td>
                          <table width="100%" cellspacing="0" cellpadding="5" class="tbldetails">
                            <tr>
                              <td width="40%" align="right">Student Number : </td>
                              <td> '.$student_id.' </td>
                            </tr>
                            <tr>
                              <td width="40%" align="right">Name : </td>
                              <td> '.$student_name.' </td>
                            </tr>
                            <tr>
                              <td align="right">Level : </td>
                              <td> '.$student_level.' </td>
                            </tr>
                            <tr>
                              <td align="right">Payment Date : </td>
                              <td> '.$payment_date.' </td>
                            </tr>
                            <tr>
                              <td align="right">Semester / Month : </td>
                              <td> '.$semester;

                            if(($semester != "") && ($month != "")){
                              $contents .= ' / ';
                            }

                            $contents .= $month.' </td>
                            </tr>
                            <tr>
                              <td align="right">Payment Type : </td>
                              <td> '.$payment_type.' </td>
                            </tr>
                            <tr>
                              <td align="right">Amount : </td>
                              <td> '.$amount.' </td>
                            </tr>
                            <tr>
                              <td align="right">Other : </td>
                              <td> '.$comments.' </td>
                            </tr>
                            <tr>
                              <td align="right">Created by : </td>
                              <td> '.$user_name.' </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                    ';

        $mpdf->WriteHTML($contents);

        
        //====== End-Amenities in the vicinity ========

        $mpdf->SetHTMLFooter('
                            <table width="100%" cellspacing="0" cellpadding="5" class="footertable" align="center" border="0">
                              <tr>
                                <td width="25%" valign="middle">
                                  <img src="'.HTTP_PATH.'images/pdf/email.png" width="15px" /> &nbsp; '.$branch_email.'
                                </td>
                                <td width="50%" align="center">
                                  <img src="'.HTTP_PATH.'images/pdf/location.png" width="15px" /> &nbsp; '.$branch_address.'
                                </td>
                                <td width="25%" align="center">
                                  <img src="'.HTTP_PATH.'images/pdf/web.png" width="15px" /> &nbsp; esol.lk
                                </td>
                              </tr>

                              <tr>
                                <td colspan="3" align="center">
                                  <img src="'.HTTP_PATH.'images/pdf/mobile.png" width="15px" /> &nbsp; Malabe 0112 075 100 | Maharagama 0112 842 100 | Hanwella 0362 251 100
                                </td>
                              </tr>
                            </table>
                          ');

        $mpdf->Output($filename . '.pdf', 'I');
        exit;
    }

    function pdf_gen_student($stu_id , $stu_reg_no, $stu_name, $stu_bday, $stu_age, $stu_address, $stu_home_tele, $stu_mobile, $stu_intake_date, $stu_join_date, $stu_level, $stu_day, $stu_teacher, $stu_father_name, $stu_father_occupation, $stu_mother_name, $stu_mother_occupation, $stu_starter, $stu_mover, $stu_flyer, $stu_ket, $stu_pet, $stu_status, $stu_remarks, $stu_user_id, $stu_branch, $get_student_payment, $get_student_exam_marks){

      $mpdf=new mPDF('utf-8', array(190,236), '', 'Gotham Sans', '5','5','5','5');

      $filename = $stu_name." Info ";
      $mpdf->SetTitle($filename);
      $mpdf->AddPage();

      $contents = '
                  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title>'.$stu_name.' Details</title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 14px Helvetica, Sans-Serif; line-height: 24px; background: url('.HTTP_PATH.'images/noise.jpg); }

        .nameclass { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 24px; font-weight: bold; letter-spacing: -2px; }

        .tbldetails tr:nth-child(even) { background: #eee; }
        .tbldetails tr td, .tblpayment tr td { height: 25px; padding: 5px; }

        .tblpayment tr:nth-child(odd) { background: #f2fafb; }
        .tblpayment tr td { border: 1px solid #3e8cd5; }
        .tblrowborder tr td { border: 1px solid #cecece; }

        .headingsclass{ background: #d5ebff; border: 1px solid #3e8cd5; }

        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 100px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 75%; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
     </style>

</head>

<body>
  <div style="width: 35%; position: absolute; top: 30px; right: 25px;">
    <img src="'.HTTP_PATH.'images/student.png"/>
  </div>

  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tbldetails" style="margin-bottom: 20px;">
    <tr>
      <td colspan="3"><span class="nameclass">'.$stu_name.'</span> <hr></td>
    </tr>
    <tr>
      <td colspan="3" class="headingsclass"><b><i>Student Information</i></b></td>
    </tr>
    <tr>
      <td width="25%">Branch</td>
      <td> : '.$stu_branch.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Student Number</td>
      <td> : '.$stu_reg_no.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Status</td>
      <td> : '.$stu_status.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Date of Birth </td>
      <td> : '.$stu_bday.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Contact Number </td>
      <td> : '.$stu_home_tele;

      if(($stu_home_tele != "") && ($stu_mobile != "")){
        $contents .=' | ';
      }

      $contents .= $stu_mobile.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Intake Date </td>
      <td> : '.$stu_intake_date.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Level </td>
      <td> : '.$stu_level.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Day </td>
      <td> : '.$stu_day.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Teacher </td>
      <td> : '.$stu_teacher.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Date of Joining </td>
      <td> : '.$stu_join_date.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Exams Completed </td>
      <td> : ';

      $exams_done = "";

      if($stu_starter != "Yet to do"){ $exams_done ='Starters'; }
      if($stu_mover != "Yet to do"){ if($exams_done == ""){ $exams_done ='Movers '; } else { $exams_done .=', Movers'; } }
      if($stu_flyer != "Yet to do"){ if($exams_done == ""){ $exams_done ='Flyers '; } else { $exams_done .=', Flyers'; } }
      if($stu_ket != "Yet to do"){ if($exams_done == ""){ $exams_done ='KET '; } else { $exams_done .=', KET'; } }
      if($stu_pet != "Yet to do"){ if($exams_done == ""){ $exams_done ='PET '; } else { $exams_done .=', PET'; }  }

      $contents .= $exams_done.' </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Address  </td>
      <td> : '.$stu_address.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Remarks  </td>
      <td> : '.$stu_remarks.'</td>
      <td>&nbsp;</td>
    </tr>
  </table>

  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tbldetails" style="margin-bottom: 15px;">
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" class="headingsclass"><b><i>Parents Information</i></b></td>
    </tr>
    <tr>
      <td width="25%">Father&#39;s Name  </td>
      <td> : '.$stu_father_name.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Father&#39;s Occupation  </td>
      <td> : '.$stu_father_occupation.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Mother&#39;s Name  </td>
      <td> : '.$stu_mother_name.'</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Mother&#39;s Occupation  </td>
      <td> : '.$stu_mother_occupation.'</td>
      <td>&nbsp;</td>
    </tr>
    
  </table>

</body>
</html>
                  ';

      $mpdf->WriteHTML($contents);

        //====== End-Amenities in the vicinity ========
       $mpdf->SetHTMLFooter('
                            <table width="100%" cellspacing="0" cellpadding="10" class="footertable" align="center">
                              <tr>
                                <td><p>'. date('Y') .' ESOL College.</p></td>
                                <td align="right"><p>'. date('d-m-Y') .' </p></td>
                              </tr>
                            </table>
                          ');

      $mpdf->AddPage();
      $contentspagetwo = '
        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tbldetails" style="margin-bottom: 15px;">
          <tr>
            <td colspan="7"><span class="nameclass">'.$stu_name.'</span> <hr></td>
          </tr>
          <tr>
            <td colspan="7" class="headingsclass"><b><i>Payments</i></b></td>
          </tr>
        </table>

        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tblpayment" style="margin-bottom: 25px;">
          <tr>
            <td><b>Receipt #</b></td>
            <td><b>Date</b></td>
            <td><b>Payment Type</b></td>
            <td><b>Amount</b></td>
            <td><b>Comments</b></td>
          </tr>
        ';

        for ($i=0; $i < count($get_student_payment) ; $i++) { 
           $contentspagetwo .= '
            <tr>
              <td>'.$get_student_payment[$i]["Rec_No"].'</td>
              <td>'.$get_student_payment[$i]["payment_date"].'</td>
              <td>'.$get_student_payment[$i]["P_type"].'</td>
              <td>'.$get_student_payment[$i]["Amount"].'</td>
              <td>'.$get_student_payment[$i]["Comm"].'</td>
            </tr>
          ';
        }

      $contentspagetwo .= '
        </table>

        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tbldetails" style="margin-bottom: 15px;">
          <tr>
            <td class="headingsclass"><b><i>Marks</i></b></td>
          </tr>
        </table>
        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="tbldetails tblrowborder" style="margin-bottom: 25px;">
          <tr>
            <td><b>Exam Type</b></td>
            <td><b>Exam Date</b></td>
            <td><b>Marks</b></td>
          </tr>
        ';

        for ($i=0; $i < count($get_student_exam_marks) ; $i++) {
          $contentspagetwo .= '
          <tr>
              <td>'.$get_student_exam_marks[$i]["marks_exam_type"].'</td>
              <td>'.$get_student_exam_marks[$i]["marks_exam_date"].'</td>
              <td>';
              if($get_student_exam_marks[$i]["marks_total"] == "-1"){
                $contentspagetwo .= 'Absent';
              }
              else{
                $contentspagetwo .= $get_student_exam_marks[$i]["marks_total"];
              }

              $contentspagetwo .='</td>
            </tr>
          ';
        }

      $contentspagetwo .= '  
        </table>

      ';
      $mpdf->WriteHTML($contentspagetwo);

        $mpdf->Output($filename . '.pdf', 'I');
        exit;
    }
}
