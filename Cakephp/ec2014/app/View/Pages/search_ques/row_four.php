<!-- TABLE FOUR START  -->
<table id = "table_4" border="1">
<tr>
<td colspan="9">
<h3 style= "text-align: center"> শুধুমাত্র উৎপাদন সংক্রান্ত কর্মকান্ডে নিয়োজিত ইউনিটের জন্য পূরণ করুন</h3>
</td>
<td colspan="3">
<h3 style= "text-align: center"> সকল ইউনিটের জন্য পূরণ করুন</h3>
</td>
</tr>
<tr>
<td>
<div id="div_18">
<h3>১৮. উৎপাদনে যন্ত্রের ব্যবহার </br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q18_machine_uses', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q18_machine_uses'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
<div id="q18details"></div>
</div></td>
<td>
<div id="div_19">
<h3>১৯. উৎপাদিত দ্রব্যের বাজারজাতকরণ </br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q19_marketing', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q19_marketing'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
<div id="q19details"></div>
</div></td>

<td>
<div id="div_20">
<h3>২০. উৎপাদনে জ্বালানির ব্যবহার </br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q20_fuel_uses', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q20_fuel_uses'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
					
<div id="q20details"></div>
</div></td>

<td>
<div id="div_21">
<h3>২১. উৎপাদনে কম্পিউটার প্রযুক্তি ব্যবহার হয় কি? </br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q21_is_it_enabled', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q21_is_it_enabled'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
<div id="q21details"></div>
</div></td>

<td>
<div id="div_22">
<h3>২২. অগ্নিনির্বাপণ ব্যবস্থা আছে কি? </br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q22_is_fire_secured', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q22_is_fire_secured'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
<div id="q22details"></div>
</div></td>

<td>
<div id="div_22_1">
<h3>২২.১ থাকলে তা নিয়মিত রক্ষণাবেক্ষণ করা হয় কি?</br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q22_is_fire_device_maintained', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q22_is_fire_device_maintained'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
					
<div id="q22_1details"></div>
</div></td>

<td>
<div id="div_23">
<h3>২৩. নিরাপদ ও স্বাস্থ্যসম্মতভাবে বর্জ্য অপসারণ ব্যবস্থা আছে কি? </br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q23_is_garbage_proper', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q23_is_garbage_proper'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
            				
<div id="q23details"></div>
</div></td>

<td>
<div id="div_24">
<h3>২৪. শৌচাগারের ব্যবস্থা আছে কি?</br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q24_is_toilet_available', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q24_is_toilet_available'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
<div id="q24details"></div>
</div></td>

<td>
<div id="div_24_1">
<h3>২৪.১ হ্যাঁ হলে মহিলাদের জন্য পৃথক ব্যবস্থা আছে কি?</br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q24_is_ladies_toilet_available', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q24_is_ladies_toilet_available'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
<div id="q24_1details"></div>
</div></td>

<td>
<div id="div_25">
<h3><span id="redmark">*</span> ২৫. টিআইএন আছে কি?</br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q25_is_tin_registered', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q25_is_tin_registered'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
            				
<div id="q25details"></div>
</div></td>

<td>
<div id="div_26">
<h3><span id="redmark">*</span> ২৬. প্রতিষ্ঠানটি মূল্য সংযোজন কর (মূসক/ভ্যাট) নিবন্ধিত কি?</br></h3><hr /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q26_is_vat_registered', array(
            			'label' => false,
            			'value' => $questionaires ['Questionaire']['q26_is_vat_registered'],
            			//'readonly' => 'readonly',
            			'type' => 'text',
            			'style'=>'width: 50px;text-align:center;'))?>
<div id="q26details"></div>
</div></td>

<td>
<div id="div_27">
<h3><span id="redmark">*</span> ২৭. হ্যাঁ হলে কোন সালে মূসক (ভ্যাট) নিবন্ধন করা হয়েছে?</br></h3><hr /> 
<label>(ইংরেজি সাল )</label>
<?=$this->Form->input('q27_year_vat_registered', array( 
					'label' => FALSE,
					'value' => $questionaires ['Questionaire']['q27_year_vat_registered'],
					//'readonly' => 'readonly',
					'type' => 'text',
					'style'=>'width: 70px;text-align:center;'))?>
</div></td>
</tr>
</table>