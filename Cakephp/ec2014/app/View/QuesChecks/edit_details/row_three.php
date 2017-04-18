


<!--  TABLE THREE START-->
		<table id="table_3" border="1">

			<tr>

				<td width="200px">
				<div id = "div_12">
					<h3>১২. <span id="redmark">*</span>কোন সালে আরম্ভ হয়েছে?</h3>
					<br>
					<hr /><br> <br />
					<label>(ইংরেজি সাল লিখুন)</label><br>
					<?=$this->Form->input('q12_year_of_start', array(
					'label' => false,
					'value' => $questionaires[0]['Questionaire']['q12_year_of_start'],
                    'type'=>'text',
                    'style'=>'width: 65px; text-align:center;',
                    'required' =>'required',
					'maxlength'=>4,
                    'minlength' =>4))
					?>
				</div></td>





				<td>
				<div id = "div_13">
					<h3><span id="redmark">*</span> ১৩. ইউনিটের বিক্রয় পদ্ধতি</h3> <br /><hr /><br><br>

          <label>(কোড লিখুন)</label>
            <?=$this -> Form -> input('q13_sale_procedure', array(
            'label' => false,
            'value' => $questionaires[0]['Questionaire']['q13_sale_procedure'],
            'required'=>'required', 
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;',
            'required' =>'required',
            'maxlength'=>1,
            'minlength' =>1 ))
            ?>
            
          <div id="q13details"></div>

      </div></td>

				<td>
				<div id = "div_14">
					<h3><span id="redmark">*</span> ১৪. হিসাব রাখার <br>ব্যবস্থা আছে কি ?</h3><hr /> <br /><br>

          
         <label>(কোড লিখুন)</label>
            <?=$this -> Form -> input('q14_is_accountable', array(
            'label' => false,
            'value' => $questionaires[0]['Questionaire']['q14_is_accountable'],
            'required'=>'required', 
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;',
            'required' =>'required',
            'maxlength'=>1,
            'minlength' =>1 ))
            ?>
            
          <div id="q14details"></div>

				</div></td>

				<td>
				<div id = "div_14_1">
					<h3><span id="redmark">*</span> ১৪.১. হ্যাঁ হলে</h3>
                      <br><hr /><br> <br />

         <label>(কোড লিখুন)</label>
            <?=$this -> Form -> input('q14_accountable_duration', array(
            'label' => false,
            'value' => $questionaires[0]['Questionaire']['q14_accountable_duration'],
            'required'=>'required', 
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;',
            'maxlength'=>1,
            'minlength' =>1 ))
            ?>
            
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
                    <td width="100"  height="158" style="border-right: 1px solid;">
                        <br /> 
 
          
         <label>(কোড লিখুন)</label>
            <?=$this -> Form -> input('q15_salary_instr', array(
            'label' => false,
            'value' => $questionaires[0]['Questionaire']['q15_salary_instr'],
            'required'=>'required',  
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;',
            'maxlength'=>1,
            'minlength' =>1 ))
            ?>
            
          <div id="q15_1details"></div>

 
 
                    </td>
                    
                   
                    
                    
                    
                    <td width="100">
                    <br />
 <label>(কোড লিখুন)</label>
            <?=$this -> Form -> input('q15_salary_period', array(
            'label' => false,
             'value' => $questionaires[0]['Questionaire']['q15_salary_period'],
            'required'=>'required',  
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;',
            'maxlength'=>1,
            'minlength' =>1 ))
            ?>
            
          <div id="q15_2details"></div>                 
              </td>
            </table>
				</div></td>






				<td>   
				<div id = "div_16">
					<h3><span id="redmark">*</span> ১৬. বর্তমান স্থায়ী মূলধন <br /> (টাকায়)  </h3> <hr />
				

          <br /> <br />
         <label>(কোড লিখুন)</label>
            <?=$this -> Form -> input('q16_fixed_capital', array(
            'label' => false,
            'value' => $questionaires[0]['Questionaire']['q16_fixed_capital'],
            'required'=>'required',  
            'type' => 'text',
            'style'=>'width: 65px; text-align:center;',
            'maxlength'=>2,
            'minlength' =>2 ))
            ?>
            
          <div id="q16details"></div>
				</div></td>


				<td>
				<div id = "div_17">
					<h3 style= "text-align: center">১৭. অর্থনৈতিক কর্মকান্ডে নিয়োজিত জনবলের প্রকার ও সংখ্যা</h3><br> <hr />

					<table id = 'tbl_17'>
						<tr>

							<td width="140"  height="186" style="border-right: 1px solid;" ><h3><span id="redmark">*</span>১৭.১ মালিক/ অংশীদার কর্মরত </h3> <hr>
							পুরুষ<br />
							<?=$this->Form->input('q17_hr_male', array(
                'label' => FALSE,
                 'value' => $questionaires[0]['Questionaire']['q17_hr_male'],
                'type'=>'text',
                'style'=>'width: 50px; text-align:center;',
                'required' =>'required', 
                'maxlength'=>2, 
                'minlength' =>2))
							?>
							মহিলা<br />
							<?=$this->Form->input('q17_hr_female', array(
                'label' =>false,
                'type'=>'text',
                'value' => $questionaires[0]['Questionaire']['q17_hr_female'],
                'style'=>'width: 50px; text-align:center;',
                'required' =>'required',  
                'maxlength'=>2,
                'minlength' =>2))
							?>
						     <br />
							</td>

							<td width="140"  style="border-right: 1px solid;"><h3><span id="redmark">*</span>১৭.২ অবৈতনিক পারিবারিক কর্মী </h3><hr>
							পুরুষ<br />	
							<?=$this->Form->input('q17_hr_male_foc', array(
							'label' => false,
							'value' => $questionaires[0]['Questionaire']['q17_hr_male_foc'],
							'type'=>'text',
							'style'=>'width: 50px; 
							text-align:center;',
							'required' =>'required',  
							'maxlength'=>2,'minlength' =>2))
							?>
							
							মহিলা<br />
							<?=$this->Form->input('q17_hr_female_foc', array(
							'label' => FALSE,
							'value' => $questionaires[0]['Questionaire']['q17_hr_female_foc'],
							'type'=>'text',
							'style'=>'width: 50px; 
							text-align:center;',
							'required' =>'required',  
							'maxlength'=>2,'minlength' =>2))
							?></td>
							
							<td width="140"   style="border-right: 1px solid;"><h3><span id="redmark">*</span>১৭.৩ সার্বক্ষণিক কর্মী</h3> <br /><hr> 
								
							পুরুষ<br />		
							<?=$this->Form->input('q17_hr_male_fulltime', array(
							'label' => FALSE,
							'value' => $questionaires[0]['Questionaire']['q17_hr_male_fulltime'],
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;',
							'required' =>'required',  
							'maxlength'=>4,'minlength' =>4))
							?>
							মহিলা<br />
							<?=$this->Form->input('q17_hr_female_fulltime', array(
							'label' => FALSE,
							'value' => $questionaires[0]['Questionaire']['q17_hr_female_fulltime'],
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;',
							'required' =>'required',  
							'maxlength'=>4,'minlength' =>4))
							?>
							</td>
							
							<td width="140"  style="border-right: 1px solid;"><h3><span id="redmark">*</span>১৭.৪ খন্ডকালীন কর্মী (মাসিক গড়)</h3><hr>
							পুরুষ<br />		
							<?=$this->Form->input('q17_hr_male_parttime', array(
							'label' => FALSE,
							'value' => $questionaires[0]['Questionaire']['q17_hr_male_parttime'],
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;',
							'required' =>'required',  
							'maxlength'=>3,'minlength' =>3))
							?>
							মহিলা<br />
							<?=$this->Form->input('q17_hr_female_parttime', array(
							'label' => FALSE,
							'value' => $questionaires[0]['Questionaire']['q17_hr_female_parttime'],
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;',
							'required' =>'required',  
							'maxlength'=>3,'minlength' =>3))
							?>
							</td> 

							<td width="140"><h3><span id="redmark">*</span>১৭.৫  অনিয়মিত কর্মী (সাপ্তাহিক গড়)</h3><hr>
							পুরুষ<br />		
							<?=$this->Form->input('q17_hr_male_irregular', array(
							'label' => FALSE,
							'value' => $questionaires[0]['Questionaire']['q17_hr_male_irregular'],
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;',
							'required' =>'required',  
							'maxlength'=>2,'minlength' =>2))
							?>
							মহিলা<br />
							<?=$this->Form->input('q17_hr_female_irregular', array(
							'label' => FALSE,
							'value' => $questionaires[0]['Questionaire']['q17_hr_female_irregular'],
							'type'=>'text',
							'style'=>'width: 50px; text-align:center;',
							'required' =>'required',  
							'maxlength'=>2,'minlength' =>2))
							?>
							</td>

						</tr>

					</table>

				</div></td>

			</tr>
		</table>
