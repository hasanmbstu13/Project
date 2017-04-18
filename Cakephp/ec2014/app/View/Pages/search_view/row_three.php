
<!--  TABLE THREE START-->
<table id="table_3" border="1">
<tr>
<td width="200px">
<div id = "div_12">
<h3>১২. <span id="redmark">*</span>কোন সালে আরম্ভ হয়েছে?</h3><br><hr /><br> <br />
<label>(ইংরেজি সাল)</label><br>
<?=$this->Form->input('q12_year_of_start', array(
					'label' => false,
					'value' => $questionaires ['Questionaire']['q12_year_of_start'],
					'readonly' => 'readonly',
                    'type'=>'text',
                    'style'=>'width: 65px; text-align:center;'))?>
</div></td>

<td>
<div id = "div_13">
<h3><span id="redmark">*</span> ১৩. ইউনিটের বিক্রয় পদ্ধতি</h3> <br /><hr /><br><br>
<label>(কোড)</label>
<?=$this -> Form -> input('q13_sale_procedure', array(
            'label' => false,
            'value' => $questionaires ['Questionaire']['q13_sale_procedure'],
            'readonly' => 'readonly', 
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;')) ?>
            
 <div id="q13details"></div>
 </div></td>

<td>
<div id = "div_14">
<h3><span id="redmark">*</span> ১৪. হিসাব রাখার <br>ব্যবস্থা আছে কি ?</h3><hr /> <br /><br>
 <label>(কোড)</label>
<?=$this -> Form -> input('q14_is_accountable', array(
            'label' => false,
            'value' => $questionaires ['Questionaire']['q14_is_accountable'],
            'readonly' => 'readonly', 
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;')) ?>
            
<div id="q14details"></div>
</div></td>

<td>
<div id = "div_14_1">
<h3><span id="redmark">*</span> ১৪.১. হ্যাঁ হলে</h3><br><hr /><br> <br />
<label>(কোড)</label>
<?=$this -> Form -> input('q14_accountable_duration', array(
            'label' => false,
            'value' => $questionaires ['Questionaire']['q14_accountable_duration'],
            'readonly' => 'readonly', 
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;'))?>
            
<div id="q14_1details"></div>
</div></td>


<td>
<div id = "div_15">
<h3>১৫. ইউনিটের বেতন/মজুরি</h3> <br /> <hr />
<table style="margin: 0px">
<tr>
<th  width="100" height="23" style="border-right: 1px solid; border-bottom: 1px solid;"><span id="redmark">*</span>১৫.১ প্রদান পদ্ধতি </th>
<th  width="100" style="border-bottom: 1px solid;" scope="col"><span id="redmark">*</span>১৫.২  প্রদানের ধরন</th>
</tr>

<tr>
<td width="100"  height="158" style="border-right: 1px solid;"> <br /> 
<label>(কোড)</label>
<?=$this -> Form -> input('q15_salary_instr', array(
            'label' => false,
            'value' => $questionaires ['Questionaire']['q15_salary_instr'],
            'readonly' => 'readonly',  
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;')) ?>
            
<div id="q15_1details"></div>
</td>
                    
                   
<td width="100"><br />
<label>(কোড)</label>
            <?=$this -> Form -> input('q15_salary_period', array(
            'label' => false,
            'value' => $questionaires ['Questionaire']['q15_salary_period'],
            'readonly' => 'readonly',  
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;'))?>
<div id="q15_2details"></div>                 
</td>
</table>
</div></td>



<td>   
<div id = "div_16">
<h3><span id="redmark">*</span> ১৬. বর্তমান স্থায়ী মূলধন <br /> (টাকায়)  </h3> <hr /><br /> <br />
<label>(কোড)</label>
 <?=$this -> Form -> input('q16_fixed_capital', array(
            'label' => false,
            'value' => $questionaires ['Questionaire']['q16_fixed_capital'],
            'readonly' => 'readonly',  
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;'))?>
<div id="q16details"></div>
</div></td>


<td>
<div id = "div_17">
<h3 style= "text-align: center">১৭. অর্থনৈতিক কর্মকান্ডে নিয়োজিত জনবলের প্রকার ও সংখ্যা</h3><br> <hr />
<table id = 'tbl_17'>
<tr>
<td width="140"  height="186" style="border-right: 1px solid;" >
<h3><span id="redmark">*</span>১৭.১ মালিক/ অংশীদার কর্মরত </h3><hr>পুরুষ<br />
<?=$this->Form->input('q17_hr_male', array(
                'label' => FALSE,
                'type'=>'text',
                'value' => $questionaires ['Questionaire']['q17_hr_male'],
                'readonly' => 'readonly',
                'style'=>'width: 50px; text-align:center;',
                'required' =>'required'))?>
মহিলা<br />
<?=$this->Form->input('q17_hr_female', array(
                'label' =>false,
                'type'=>'text',
                'value' => $questionaires ['Questionaire']['q17_hr_female'],
                'readonly' => 'readonly',
                'style'=>'width: 50px; text-align:center;'))?> <br />
</td>

<td width="140"  style="border-right: 1px solid;">
<h3><span id="redmark">*</span>১৭.২ অবৈতনিক পারিবারিক কর্মী </h3><hr>পুরুষ<br />	
<?=$this->Form->input('q17_hr_male_foc', array(
							'label' => false,
							'value' => $questionaires ['Questionaire']['q17_hr_male_foc'],
							'readonly' => 'readonly',
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;'))?>
							
মহিলা<br />
<?=$this->Form->input('q17_hr_female_foc', array(
							'label' => FALSE,
							'value' => $questionaires ['Questionaire']['q17_hr_female_foc'],
							'readonly' => 'readonly',
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;'))?></td>
							
<td width="140"   style="border-right: 1px solid;">
<h3><span id="redmark">*</span>১৭.৩ সার্বক্ষণিক কর্মী</h3> <br /><hr>পুরুষ<br />		
<?=$this->Form->input('q17_hr_male_fulltime', array(
							'label' => FALSE,
							'value' => $questionaires ['Questionaire']['q17_hr_male_fulltime'],
							'readonly' => 'readonly',
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;'))?>
মহিলা<br />
<?=$this->Form->input('q17_hr_female_fulltime', array(
							'label' => FALSE,
							'value' => $questionaires ['Questionaire']['q17_hr_female_fulltime'],
							'readonly' => 'readonly',
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;'))?>
							</td>
							
<td width="140"  style="border-right: 1px solid;">
<h3><span id="redmark">*</span>১৭.৪ খন্ডকালীন কর্মী (মাসিক গড়)</h3><hr>পুরুষ<br />		
<?=$this->Form->input('q17_hr_male_parttime', array(
							'label' => FALSE,
							'value' => $questionaires ['Questionaire']['q17_hr_male_parttime'],
							'readonly' => 'readonly',
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;'))?>
মহিলা<br />
<?=$this->Form->input('q17_hr_female_parttime', array(
							'label' => FALSE,
							'value' => $questionaires ['Questionaire']['q17_hr_female_parttime'],
							'readonly' => 'readonly',
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;'))?>
							</td> 
<td width="140"><h3><span id="redmark">*</span>১৭.৫  অনিয়মিত কর্মী (সাপ্তাহিক গড়)</h3><hr>পুরুষ<br />		
<?=$this->Form->input('q17_hr_male_irregular', array(
							'label' => FALSE,
							'value' => $questionaires ['Questionaire']['q17_hr_male_irregular'],
							'readonly' => 'readonly',
							'type'=>'text','style'=>'width: 50px; text-align:center;'))?>
মহিলা<br />
<?=$this->Form->input('q17_hr_female_irregular', array(
							'label' => FALSE,
							'value' => $questionaires ['Questionaire']['q17_hr_female_irregular'],
							'readonly' => 'readonly',
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;'))?>
							</td>
</tr>
</table>
</div></td>
</tr>
</table>
