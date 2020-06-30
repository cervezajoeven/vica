<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 15">
<meta name=Originator content="Microsoft Word 15">
<link rel=File-List href="form138_files/filelist.xml">

<link rel=dataStoreItem href="form138_files/item0006.xml"
target="form138_files/props007.xml">
<link rel=themeData href="form138_files/themedata.thmx">
<link rel=colorSchemeMapping href="form138_files/colorschememapping.xml">

<style>/* Font Definitions */@font-face{font-family:"Cambria Math";panose-1:2 4 5 3 5 4 6 3 2 4;mso-font-charset:1;mso-generic-font-family:roman;mso-font-format:other;mso-font-pitch:variable;mso-font-signature:0 0 0 0 0 0;}@font-face{font-family:Calibri;panose-1:2 15 5 2 2 2 4 3 2 4;mso-font-charset:0;mso-generic-font-family:swiss;mso-font-pitch:variable;mso-font-signature:-536859905 -1073732485 9 0 511 0;}/* Style Definitions */p.MsoNormal, li.MsoNormal, div.MsoNormal{mso-style-unhide:no;mso-style-qformat:yes;mso-style-parent:"";margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:105%;mso-pagination:widow-orphan;font-size:11.0pt;font-family:"Calibri","sans-serif";mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";mso-bidi-theme-font:minor-bidi;}span.SpellE{mso-style-name:"";mso-spl-e:yes;}span.GramE{mso-style-name:"";mso-gram-e:yes;}.MsoChpDefault{mso-style-type:export-only;mso-default-props:yes;font-size:10.0pt;mso-ansi-font-size:10.0pt;mso-bidi-font-size:10.0pt;font-family:"Calibri","sans-serif";mso-ascii-font-family:Calibri;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-hansi-font-family:Calibri;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:"Times New Roman";mso-bidi-theme-font:minor-bidi;}@page WordSection1{size:8.5in 11.0in;margin:.3in 1.0in 1.0in .5in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}div.WordSection1{page:WordSection1;}
</style>

</head>

<?php 

function output_grade($grades,$semester,$subject){
  if(array_key_exists($semester, $grades)){
    if(array_key_exists($subject,$grades[$semester]['grades'])){
      return number_format((float)$grades[$semester]['grades'][$subject], 2, '.', '');
    }
  }
}

function average($array=array()){
  $average = ceil(array_sum($array) / count($array));
  return number_format((float)$average, 2, '.', '');
}

?>
<?php $grade_info = $general_class->data['student_grades']; ?>
<?php $profile = $general_class->data['profile']; ?>
<?php $level = $profile['grade_name']; ?>
<?php $level_access = array(1,2,3); ?>
<?php
    $final_rating['english'] = array();
    $final_rating['language'] = array();
    $final_rating['reading'] = array();
    $final_rating['mathematics'] = array();
    $final_rating['science'] = array();
    $final_rating['filipino'] = array();
    $final_rating['araling_panlipunan'] = array();
    $final_rating['christian_living'] = array();
    $final_rating['mape'] = array();
    $final_rating['music'] = array();
    $final_rating['arts'] = array();
    $final_rating['pe'] = array();
    $final_rating['general_average'] = array();
?>
<?php //print_r($grade_info); ?>
<?php if($grade_info): ?>
    <?php $grades = $grade_info['grades']; ?>
    <?php 
        for($x=1;$x<=3;$x++){
            if(array_key_exists($x, $grades)){
                if(!array_key_exists('english', $grades[$x])){              $grades[$x]['english']=0;}
                if(!array_key_exists('language', $grades[$x])){             $grades[$x]['language']=0;}
                if(!array_key_exists('reading', $grades[$x])){              $grades[$x]['reading']=0;}
                if(!array_key_exists('mathematics', $grades[$x])){          $grades[$x]['mathematics']=0;}
                if(!array_key_exists('science', $grades[$x])){              $grades[$x]['science']=0;}
                if(!array_key_exists('filipino', $grades[$x])){             $grades[$x]['filipino']=0;}
                if(!array_key_exists('araling panlipunan', $grades[$x])){   $grades[$x]['araling panlipunan']=0;}
                if(!array_key_exists('christian living', $grades[$x])){     $grades[$x]['christian living']=0;}
                if(!array_key_exists('music', $grades[$x])){                $grades[$x]['music']=0;}
                if(!array_key_exists('arts', $grades[$x])){                 $grades[$x]['arts']=0;}
                if(!array_key_exists('pe', $grades[$x])){                   $grades[$x]['pe']=0;}
                $grades[$x]['mape'] = average(array($grades[$x]['music'],$grades[$x]['arts'],$grades[$x]['pe']));
                if(in_array($level, $level_access)){
                    $grades[$x]['english'] = average(array($grades[$x]['language'],$grades[$x]['reading']));
                }
                array_push($final_rating['english'], $grades[$x]['english']);
                array_push($final_rating['language'], $grades[$x]['language']);
                array_push($final_rating['reading'], $grades[$x]['reading']);
                array_push($final_rating['mathematics'], $grades[$x]['mathematics']);
                array_push($final_rating['science'], $grades[$x]['science']);
                array_push($final_rating['filipino'], $grades[$x]['filipino']);
                array_push($final_rating['araling_panlipunan'], $grades[$x]['araling panlipunan']);
                array_push($final_rating['christian_living'], $grades[$x]['christian living']);
                array_push($final_rating['mape'], $grades[$x]['mape']);
                array_push($final_rating['music'], $grades[$x]['music']);
                array_push($final_rating['arts'], $grades[$x]['arts']);
                array_push($final_rating['pe'], $grades[$x]['pe']);

                $grades[$x]['general_average'] = average(array($grades[$x]['english'],$grades[$x]['mathematics'],$grades[$x]['science'],$grades[$x]['filipino'],$grades[$x]['araling panlipunan']));
                array_push($final_rating['general_average'], $grades[$x]['general_average']);

            }else{
                $grades[$x]['english'] = 0;
                $grades[$x]['language'] = 0;
                $grades[$x]['reading'] = 0;
                $grades[$x]['mathematics'] = 0;
                $grades[$x]['science'] = 0;
                $grades[$x]['filipino'] = 0;
                $grades[$x]['araling panlipunan'] = 0;
                $grades[$x]['christian living'] = 0;
                $grades[$x]['music'] = 0;
                $grades[$x]['arts'] = 0;
                $grades[$x]['pe'] = 0;
                $grades[$x]['mape'] = average(array($grades[$x]['music'],$grades[$x]['arts'],$grades[$x]['pe']));

                array_push($final_rating['english'], 0);
                array_push($final_rating['language'], 0);
                array_push($final_rating['reading'], 0);
                array_push($final_rating['mathematics'], 0);
                array_push($final_rating['science'], 0);
                array_push($final_rating['filipino'], 0);
                array_push($final_rating['araling_panlipunan'],0);
                array_push($final_rating['christian_living'],0);
                array_push($final_rating['mape'], 0);
                array_push($final_rating['music'], 0);
                array_push($final_rating['arts'], 0);
                array_push($final_rating['pe'], 0);
                $grades[$x]['general_average'] = average(array($grades[$x]['english'],$grades[$x]['mathematics'],$grades[$x]['science'],$grades[$x]['filipino'],$grades[$x]['araling panlipunan']));
                array_push($final_rating['general_average'], $grades[$x]['general_average']);
            }
        }
    ?>
    <?php 
        $final_rating['english'] = average($final_rating['english']);
        $final_rating['language'] = average($final_rating['language']);
        $final_rating['reading'] = average($final_rating['reading']);
        $final_rating['mathematics'] = average($final_rating['mathematics']);
        $final_rating['science'] = average($final_rating['science']);
        $final_rating['filipino'] = average($final_rating['filipino']);
        $final_rating['araling_panlipunan'] = average($final_rating['araling_panlipunan']);
        $final_rating['christian_living'] = average($final_rating['christian_living']);
        $final_rating['mape'] = average($final_rating['mape']);
        $final_rating['music'] = average($final_rating['music']);
        $final_rating['arts'] = average($final_rating['arts']);
        $final_rating['pe'] = average($final_rating['pe']);
        $final_rating['general_average'] = average($final_rating['general_average']);
    ?>
    <?php //print_r($grades); ?>
<?php endif; ?>

<body lang=EN-US style='tab-interval:.5in'>

<div class=WordSection1>




<p class=MsoNormal align=center style='margin-bottom:.5pt;text-align:center;
line-height:normal'><b style='mso-bidi-font-weight:normal'><i style='mso-bidi-font-style:
normal'><span style='font-size:18.0pt'>St. Therese</span></i></b><span
style='font-size:18.0pt'> <b style='mso-bidi-font-weight:normal'>PRIVATE SCHOOL</b><o:p></o:p></span></p>

<p class=MsoNormal align=center style='margin-bottom:.5pt;text-align:center;
line-height:normal'>#720 Sgt. <span class=SpellE>Bumatay</span> St. Plainview <span
class=SpellE>Subdvision</span>, <span class=SpellE>Mandaluyong</span> City</p>

<p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center;
line-height:normal'><b style='mso-bidi-font-weight:normal'>SY 2018 – 2019<o:p></o:p></b></p>

<table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0 width="100%"
 style='width:100.0%;border-collapse:collapse;border:none;mso-yfti-tbllook:
 1184;mso-padding-alt:0in 5.4pt 0in 5.4pt;mso-border-insideh:none;mso-border-insidev:
 none'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width="18%" valign=top style='width:18.36%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><b style='mso-bidi-font-weight:
  normal'>Student Name<o:p></o:p></b></p>
  </td>
  <td width="24%" valign=top style='width:24.28%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><?php echo $profile['last_name']?>, <?php echo $profile['first_name']?></p>
  </td>
  <td width="18%" valign=top style='width:18.96%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><b style='mso-bidi-font-weight:
  normal'>Gender<o:p></o:p></b></p>
  </td>
  <td width="38%" colspan=2 valign=top style='width:38.42%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><?php echo ucfirst($grade_info['gender']); ?></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width="18%" valign=top style='width:18.36%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><b style='mso-bidi-font-weight:
  normal'>LRN NO<o:p></o:p></b></p>
  </td>
  <td width="24%" valign=top style='width:24.28%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'>16-5321</p>
  </td>
  <td width="18%" valign=top style='width:18.96%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><b style='mso-bidi-font-weight:
  normal'>Birthday<o:p></o:p></b></p>
  </td>
  <td width="38%" colspan=2 valign=top style='width:38.42%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'>01/04/2012</p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width="18%" valign=top style='width:18.36%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><b style='mso-bidi-font-weight:
  normal'>Student Number<o:p></o:p></b></p>
  </td>
  <td width="24%" valign=top style='width:24.28%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><?php echo $profile['username']?></p>
  </td>
  <td width="18%" valign=top style='width:18.96%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><b style='mso-bidi-font-weight:
  normal'>Grade &amp; Section<o:p></o:p></b></p>
  </td>
  <td width="38%" colspan=2 valign=top style='width:38.42%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'>Grade <?php echo $profile['grade_name'] ?> - <?php echo $profile['section_name'] ?></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3;mso-yfti-lastrow:yes'>
  <td width="18%" valign=top style='width:18.36%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><b style='mso-bidi-font-weight:
  normal'>Class Adviser<o:p></o:p></b></p>
  </td>
  <td width="24%" valign=top style='width:24.28%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'>Ms. <span class=SpellE>Shenalyn</span>
  DV Simeon</p>
  </td>
  <td width="34%" colspan=2 valign=top style='width:34.44%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><o:p>&nbsp;</o:p></p>
  </td>
  <td width="22%" valign=top style='width:22.94%;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <![if !supportMisalignedColumns]>
 <tr height=0>
  <td width=130 style='border:none'></td>
  <td width=172 style='border:none'></td>
  <td width=134 style='border:none'></td>
  <td width=110 style='border:none'></td>
  <td width=162 style='border:none'></td>
 </tr>
 <![endif]>
</table>

<p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
line-height:105%'><o:p>&nbsp;</o:p></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width="100%"
 style='width:100.0%;border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:15.25pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Learning Areas<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>1<sup>st</sup><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>2<sup>nd</sup><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>3<sup>rd</sup><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Final Rating<o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Action Taken<o:p></o:p></span></p>
  </td>
  <td width="27%" rowspan=14 valign=top style='width:27.06%;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:15.25pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt;line-height:normal'><span
  style='font-size:5.0pt'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:1.0pt;line-height:normal'><span
  style='font-size:8.0pt'>To the Parents/Guardians: <o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>This report card is issued at the end of every trimester to
  keep you informed of your child’s progress. It is your obligation to claim
  this Report Card on the scheduled date of issuance during the Parent –
  Teacher Conference (PTC)<o:p></o:p></span></p>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'><o:p>&nbsp;</o:p></span></p>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>The Administration feels that this Report Card is
  sufficient to keep you aware of your son’s/daughter’s progress. Should you
  feel that results in any of the areas hereto contained are not satisfactory,
  a conference with the teacher/s concerned, which is usually scheduled after
  class hours is <span class=GramE>recommended.</span><o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1;height:5.35pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:5.35pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>

  English

  <o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:5.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['english']?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:5.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['english']?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:5.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['english']?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:5.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['english']?><o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:5.35pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>

<?php if(in_array($level, $level_access)): ?>
    <tr style='mso-yfti-irow:2;height:7.6pt'>
        <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
        none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
        padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
        <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
        line-height:105%'>


        Language


        <o:p></o:p></span></p>
        </td>
        <td width="3%" style='width:3.56%;border-top:none;border-left:none;
        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
        mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
        <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
        style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['language'] ?><o:p></o:p></span></p>
        </td>
        <td width="3%" style='width:3.78%;border-top:none;border-left:none;
        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
        mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
        <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
        style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['language'] ?><o:p></o:p></span></p>
        </td>
        <td width="3%" style='width:3.56%;border-top:none;border-left:none;
        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
        mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
        <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
        style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['language'] ?><o:p></o:p></span></p>
        </td>
        <td width="5%" style='width:5.38%;border-top:none;border-left:none;
        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
        mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
        <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
        style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['language'] ?><o:p></o:p></span></p>
        </td>
        <td width="26%" style='width:26.94%;border-top:none;border-left:none;
        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
        mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
        <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
        style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
        </td>
    </tr>


    <tr style='mso-yfti-irow:3;height:4.9pt'>

        <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
        none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
        padding:0in 5.4pt 0in 5.4pt;height:4.9pt'>
        <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
        line-height:105%'>


        Reading


        <o:p></o:p></span></p>
        </td>
        <td width="3%" style='width:3.56%;border-top:none;border-left:none;
        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
        mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
        <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
        style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['reading'] ?><o:p></o:p></span></p>
        </td>
        <td width="3%" style='width:3.78%;border-top:none;border-left:none;
        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
        mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
        <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
        style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['reading'] ?><o:p></o:p></span></p>
        </td>
        <td width="3%" style='width:3.56%;border-top:none;border-left:none;
        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
        mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
        <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
        style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['reading'] ?><o:p></o:p></span></p>
        </td>
        <td width="5%" style='width:5.38%;border-top:none;border-left:none;
        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
        mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
        <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
        style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['reading'] ?><o:p></o:p></span></p>
        </td>


        <td width="26%" style='width:26.94%;border-top:none;border-left:none;
        border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
        mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
        mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.9pt'>
        <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
        style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
        </td>
    </tr>
<?php endif; ?>
 <tr style='mso-yfti-irow:4;height:2.9pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>



  Mathematics




  <o:p></o:p></span></p>
  </td>
    <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['mathematics'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['mathematics'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['mathematics'] ?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['mathematics'] ?><o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5;height:2.9pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>




  Science &amp; Health




  <o:p></o:p></span></p>
  </td>
  </td>
    <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['science'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['science'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['science'] ?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['science'] ?><o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:6;height:6.7pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:6.7pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>


  Filipino



  <o:p></o:p></span></p>
  </td>


  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['filipino'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['filipino'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['filipino'] ?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['filipino'] ?><o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:6.7pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:7;height:4.45pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:4.45pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span class=SpellE><span
  style='font-size:8.0pt;line-height:105%'>



    Araling</span></span><span style='font-size:8.0pt;line-height:105%'> <span class=SpellE>Panlipunan</span><o:p></o:p></span></p>


  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['araling panlipunan'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['araling panlipunan'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['araling panlipunan'] ?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['araling_panlipunan'] ?><o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.45pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:8;height:2.9pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0in 5.4pt 0in 5.4pt;
  height:2.9pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>




  General Average




  <o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['general_average'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['general_average'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['general_average'] ?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>
    <?php echo $final_rating['general_average'] ?>

  </o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:9;height:8.5pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>


  Christian Living Education


  <o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['christian living'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['christian living'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['christian living'] ?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['christian_living'] ?><o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:8.5pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:10;height:2.9pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>

  M.A.P.E


  <o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['mape'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['mape'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['mape'] ?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['mape'] ?><o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:11;height:3.55pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:3.55pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>



  *Music




  <o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['music'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['music'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['music'] ?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['music'] ?><o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:3.55pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:11;height:3.55pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:3.55pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>



  *Arts




  <o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['arts'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['arts'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['arts'] ?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['arts'] ?><o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:3.55pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:12;height:5.8pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:5.8pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>



  *Physical Education




  <o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[1]['pe'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[2]['pe'] ?><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $grades[3]['pe'] ?><o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:7.6pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><?php echo $final_rating['pe'] ?><o:p></o:p></span></p>
  </td>

  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:5.8pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:13;mso-yfti-lastrow:yes;height:2.9pt'>
  <td width="29%" style='width:29.7%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Deportment<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>87<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.78%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>87<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.56%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>87<o:p></o:p></span></p>
  </td>
  <td width="5%" style='width:5.38%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>87<o:p></o:p></span></p>
  </td>
  <td width="26%" style='width:26.94%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:2.9pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width="100%"
 style='width:100.0%;border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width="11%" style='width:11.58%;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>ATTENDANCE<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.32%;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>1<sup>st</sup><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.6%;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>2<sup>nd</sup><o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.4%;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>3<sup>rd</sup><o:p></o:p></span></p>
  </td>
  <td width="6%" style='width:6.2%;border:solid windowtext 1.0pt;border-left:
  none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>TOTAL<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border:solid white 1.0pt;
  mso-border-themecolor:background1;border-left:none;mso-border-left-alt:solid white .5pt;
  mso-border-left-themecolor:background1;mso-border-alt:solid white .5pt;
  mso-border-themecolor:background1;background:white;mso-background-themecolor:
  background1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border:solid white 1.0pt;
  mso-border-themecolor:background1;border-left:none;mso-border-left-alt:solid white .5pt;
  mso-border-left-themecolor:background1;mso-border-alt:solid white .5pt;
  mso-border-themecolor:background1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="25%" valign=top style='width:25.76%;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Descriptors<o:p></o:p></span></p>
  </td>
  <td width="7%" valign=top style='width:7.84%;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Grading Scale<o:p></o:p></span></p>
  </td>
  <td width="8%" valign=top style='width:8.32%;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Remarks<o:p></o:p></span></p>
  </td>
  <td width="6%" rowspan=6 valign=top style='width:6.98%;border:none;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-left-alt:
  solid black .5pt;mso-border-left-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-right-alt:solid black .5pt;
  mso-border-right-themecolor:text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="9%" valign=top style='width:9.96%;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-left:none;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Letter Grade Equivalent<o:p></o:p></span></p>
  </td>
  <td width="9%" valign=top style='width:9.64%;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:
  text1;mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Deportment<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width="11%" style='width:11.58%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Days of School<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.32%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.6%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.4%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center;
  tab-stops:center 45.0pt'><span style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="6%" style='width:6.2%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border-top:none;border-left:none;
  border-bottom:solid white 1.0pt;mso-border-bottom-themecolor:background1;
  border-right:solid white 1.0pt;mso-border-right-themecolor:background1;
  mso-border-top-alt:solid white .5pt;mso-border-top-themecolor:background1;
  mso-border-left-alt:solid white .5pt;mso-border-left-themecolor:background1;
  mso-border-alt:solid white .5pt;mso-border-themecolor:background1;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border-top:none;border-left:none;
  border-bottom:solid white 1.0pt;mso-border-bottom-themecolor:background1;
  border-right:solid white 1.0pt;mso-border-right-themecolor:background1;
  mso-border-top-alt:solid white .5pt;mso-border-top-themecolor:background1;
  mso-border-left-alt:solid white .5pt;mso-border-left-themecolor:background1;
  mso-border-alt:solid white .5pt;mso-border-themecolor:background1;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="25%" valign=top style='width:25.76%;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Outstanding<o:p></o:p></span></p>
  </td>
  <td width="7%" style='width:7.84%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>90 – 100<o:p></o:p></span></p>
  </td>
  <td width="8%" style='width:8.32%;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Passed<o:p></o:p></span></p>
  </td>
  <td width="9%" style='width:9.96%;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>95 – 100<o:p></o:p></span></p>
  </td>
  <td width="9%" style='width:9.64%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid windowtext .5pt;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>A+<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2'>
  <td width="11%" style='width:11.58%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Days Present<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.32%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.6%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.4%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="6%" style='width:6.2%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border-top:none;border-left:none;
  border-bottom:solid white 1.0pt;mso-border-bottom-themecolor:background1;
  border-right:solid white 1.0pt;mso-border-right-themecolor:background1;
  mso-border-top-alt:solid white .5pt;mso-border-top-themecolor:background1;
  mso-border-left-alt:solid white .5pt;mso-border-left-themecolor:background1;
  mso-border-alt:solid white .5pt;mso-border-themecolor:background1;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border-top:none;border-left:none;
  border-bottom:solid white 1.0pt;mso-border-bottom-themecolor:background1;
  border-right:solid white 1.0pt;mso-border-right-themecolor:background1;
  mso-border-top-alt:solid white .5pt;mso-border-top-themecolor:background1;
  mso-border-left-alt:solid white .5pt;mso-border-left-themecolor:background1;
  mso-border-alt:solid white .5pt;mso-border-themecolor:background1;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="25%" valign=top style='width:25.76%;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Very Satisfactory<o:p></o:p></span></p>
  </td>
  <td width="7%" style='width:7.84%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>85 – 89<o:p></o:p></span></p>
  </td>
  <td width="8%" style='width:8.32%;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Passed<o:p></o:p></span></p>
  </td>
  <td width="9%" style='width:9.96%;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>90 – 94<o:p></o:p></span></p>
  </td>
  <td width="9%" style='width:9.64%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid windowtext .5pt;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>A<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:3'>
  <td width="11%" style='width:11.58%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Days Absent<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.32%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.6%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.4%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="6%" style='width:6.2%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border-top:none;border-left:none;
  border-bottom:solid white 1.0pt;mso-border-bottom-themecolor:background1;
  border-right:solid white 1.0pt;mso-border-right-themecolor:background1;
  mso-border-top-alt:solid white .5pt;mso-border-top-themecolor:background1;
  mso-border-left-alt:solid white .5pt;mso-border-left-themecolor:background1;
  mso-border-alt:solid white .5pt;mso-border-themecolor:background1;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border-top:none;border-left:none;
  border-bottom:solid white 1.0pt;mso-border-bottom-themecolor:background1;
  border-right:solid white 1.0pt;mso-border-right-themecolor:background1;
  mso-border-top-alt:solid white .5pt;mso-border-top-themecolor:background1;
  mso-border-left-alt:solid white .5pt;mso-border-left-themecolor:background1;
  mso-border-alt:solid white .5pt;mso-border-themecolor:background1;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="25%" valign=top style='width:25.76%;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Satisfactory<o:p></o:p></span></p>
  </td>
  <td width="7%" style='width:7.84%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>80 – 84<o:p></o:p></span></p>
  </td>
  <td width="8%" style='width:8.32%;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Passed<o:p></o:p></span></p>
  </td>
  <td width="9%" style='width:9.96%;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>85 – 89<o:p></o:p></span></p>
  </td>
  <td width="9%" style='width:9.64%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid windowtext .5pt;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>B<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:4'>
  <td width="11%" style='width:11.58%;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Times Tardy<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.32%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.6%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="3%" style='width:3.4%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="6%" style='width:6.2%;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>47<o:p></o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border-top:none;border-left:none;
  border-bottom:solid white 1.0pt;mso-border-bottom-themecolor:background1;
  border-right:solid white 1.0pt;mso-border-right-themecolor:background1;
  mso-border-top-alt:solid white .5pt;mso-border-top-themecolor:background1;
  mso-border-left-alt:solid white .5pt;mso-border-left-themecolor:background1;
  mso-border-alt:solid white .5pt;mso-border-themecolor:background1;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border-top:none;border-left:none;
  border-bottom:solid white 1.0pt;mso-border-bottom-themecolor:background1;
  border-right:solid white 1.0pt;mso-border-right-themecolor:background1;
  mso-border-top-alt:solid white .5pt;mso-border-top-themecolor:background1;
  mso-border-left-alt:solid white .5pt;mso-border-left-themecolor:background1;
  mso-border-alt:solid white .5pt;mso-border-themecolor:background1;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="25%" valign=top style='width:25.76%;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Fairly Satisfactory<o:p></o:p></span></p>
  </td>
  <td width="7%" style='width:7.84%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>75 – 79<o:p></o:p></span></p>
  </td>
  <td width="8%" style='width:8.32%;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Passed<o:p></o:p></span></p>
  </td>
  <td width="9%" style='width:9.96%;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>80 – 84<o:p></o:p></span></p>
  </td>
  <td width="9%" style='width:9.64%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid windowtext .5pt;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>B+<o:p></o:p></span></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:5;mso-yfti-lastrow:yes'>
  <td width="28%" colspan=5 style='width:28.1%;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border-top:none;border-left:none;
  border-bottom:solid white 1.0pt;mso-border-bottom-themecolor:background1;
  border-right:solid white 1.0pt;mso-border-right-themecolor:background1;
  mso-border-top-alt:solid white .5pt;mso-border-top-themecolor:background1;
  mso-border-left-alt:solid white .5pt;mso-border-left-themecolor:background1;
  mso-border-alt:solid white .5pt;mso-border-themecolor:background1;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="1%" valign=top style='width:1.7%;border-top:none;border-left:none;
  border-bottom:solid white 1.0pt;mso-border-bottom-themecolor:background1;
  border-right:solid white 1.0pt;mso-border-right-themecolor:background1;
  mso-border-top-alt:solid white .5pt;mso-border-top-themecolor:background1;
  mso-border-left-alt:solid white .5pt;mso-border-left-themecolor:background1;
  mso-border-alt:solid white .5pt;mso-border-themecolor:background1;padding:
  0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'><o:p>&nbsp;</o:p></span></p>
  </td>
  <td width="25%" valign=top style='width:25.76%;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:1.0pt'><span style='font-size:8.0pt;
  line-height:105%'>Did Not Meet Expectations<o:p></o:p></span></p>
  </td>
  <td width="7%" style='width:7.84%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid black 1.0pt;
  mso-border-right-themecolor:text1;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid black .5pt;mso-border-right-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Below 75<o:p></o:p></span></p>
  </td>
  <td width="8%" style='width:8.32%;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>Failed<o:p></o:p></span></p>
  </td>
  <td width="9%" style='width:9.96%;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>75 – 79<o:p></o:p></span></p>
  </td>
  <td width="9%" style='width:9.64%;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid windowtext .5pt;
  mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:1.0pt;text-align:center'><span
  style='font-size:8.0pt;line-height:105%'>C<o:p></o:p></span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='margin-bottom:1.0pt'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal style='margin-bottom:1.0pt'><o:p>&nbsp;</o:p></p>

<p class=MsoNormal style='margin-bottom:1.0pt'><o:p>&nbsp;</o:p></p>

</div>

</body>

</html>
