<!--  TABLE ONE START -->
<table id="table_1" border="1px" width="900px">
    <tr>
        <td width="250px">
        <div id="div_1">
            <h3>১. মৌজা/মহল্লার নাম ও কোড</h3>
            <hr />
            <label>নাম:</label>
            <?=$this -> Form -> input('q1_geo_code_mauza_name', array(
            'label' => false,
            'style' => 'text-align: center;',
            'value' => $questionaires[0]['Questionaire']['q1_geo_code_mauza_name'],
            'readonly' => 'readonly'))
            ?>
            <label><span id="redmark">*</span> কোড:</label>
            
    <!--    <?=$this -> Form -> input('q1_geo_code_mauza_id', array(
            'label' => false,
            'value' => $questionaires[0]['GeoCodeMauza']['mauza_code'], 
            'type' => 'text', 
            'style' => 'width: 65px; text-align:center;',
            'required' => 'required',
            'maxlength' => 3, 
            'minlength' => 3, ))
            ?>
             -->
            
         <!--   <?php
		echo $this->Form->input('q1_geo_code_mauza_id', array('empty' => '', 'options' => $divns, 'label' => 'বিভাগ')); 
		?>  -->
            
        
            <?=$this -> Form -> input('q1_geo_code_mauza_id', array(
            'label' => false, 
            'type' => 'text',
            'value' => $questionaires[0]['GeoCodeMauza']['mauza_code'],  
            'style' => 'width: 65px; text-align:center;',
            'autofocus' => 'autofocus', 
            'required' => 'required',
            'readonly' => 'readonly', 
            'maxlength' => 3, 
            'minlength' => 3, ))
            ?>
            
            
            <br />
            <hr />
            <h3><span id="redmark">*</span> ১.১  ইউনিটের ক্রমিক নং:</h3>
            <?=$this -> Form -> input('q1_unit_serial_no', array(
            'label' => FALSE,
            'type' => 'text',
            'value' => $questionaires[0]['Questionaire']['q1_unit_serial_no'],   
            'style' => 'width: 65px; text-align:center;', 
            'required' => 'required',
            'readonly' => 'readonly', 
            'maxlength' => 3, 
            'minlength' => 3, )) ?>
        </div></td>

        <td width="350px">
        <div id="div_2">
            <h3>২. ইউনিটের নাম ও ঠিকানা (ইংরেজিতে লিখুন)</h3>
            <hr />
            <table width="350px" input[type=text]{text-transform: uppercase;}>
                <tr>
                    <td style="text-align: right;"><span id="redmark">*</span> নাম:</td>
                    <td><?=$this -> Form -> input('q2_unit_name', array(
                    'label' => FALSE,
                    'readonly' => 'readonly',
                    'value' => $questionaires[0]['Questionaire']['q2_unit_name'],  
                    'required' => 'required', 
                    'style' => 'text-transform: uppercase; text-align:center;')) ?></td>
                </tr>
                <!--  -->
            <tr>
                    <td style="text-align: right;"><span id="redmark">*</span> গ্রাম/মহল্লা:</td>
                    <td> <?=$this -> Form -> input('q2_village_maholla', array(
                    'label' => false,
                    'value' => $questionaires[0]['Questionaire']['q2_village_maholla'],   
                    'type' => 'text',
                    'readonly' => 'readonly', 
                    'required' => 'required',
                    'style' => 'text-transform: uppercase; text-align:center;')) ?> </td>
                </tr>
                
                
              
                
                
		
			
                <tr>
                    <td style="text-align: right;">বাড়ি/মার্কেট এর নাম:</td>
                    <td> <?=$this -> Form -> input('q2_home_market', array(
                    'label' => false,
                    'readonly' => 'readonly',
                    'value' => $questionaires[0]['Questionaire']['q2_home_market'],   
                    'style' => 'text-transform: uppercase; text-align:center;')) ?> </td>
                </tr>
                <!--  -->
                <?php //if($books['GeoCodeRmo']['rmo_code'] != 1): ?>
                <tr>
                    <td style="text-align: right;"><span id="redmark">*</span>রোড নং/নাম:</td>
                    <td> <?=$this -> Form -> input('q2_road_no_name ', array(
                    'label' => false,
                    'readonly' => 'readonly',
                    'value' => $questionaires[0]['Questionaire']['q2_road_no_name'],   
                    'style' => 'text-transform: uppercase; text-align:center;')) ?> </td>
                </tr>
                <?php //endif; ?>
                <!--  -->
                <tr>
                    <td style="text-align: right;">হোল্ডিং নং :</td>
                    <td> <?=$this -> Form -> input('q2_holding_no', array(
                    'label' => false,
                    'readonly' => 'readonly',
                    'value' => $questionaires[0]['Questionaire']['q2_holding_no'],   
                    'style' => 'text-transform: uppercase; text-align:center;')) ?> </td>
                    </tr
                <tr>
                    <td style="text-align: right;"><span id="redmark">*</span>টেলিফোন নং:</td>
                    <td> <?=$this -> Form -> input('q2_telephone_no', array(
                    'label' => false,
                    'readonly' => 'readonly',
                    'value' => $questionaires[0]['Questionaire']['q2_telephone_no'],   
                    'style' => 'text-transform: uppercase; text-align:center;')) ?> </td>
                    </tr
                <tr>
                    <td style="text-align: right;">ফ্যাক্স নং:</td>
                    <td> <?=$this -> Form -> input('q2_fax_no', array(
                    'label' => false,
                    'readonly' => 'readonly',
                    'value' => $questionaires[0]['Questionaire']['q2_fax_no'],   
                    'style' => 'text-transform: uppercase; text-align:center;')) ?> </td>
                    </tr
                <tr>
                    <td style="text-align: right;">ইমেইল ঠিকানা:</td>
                    <td> <?=$this -> Form -> input('q2_email_address', array(
                    'label' => false,
                    'readonly' => 'readonly',
                    'value' => $questionaires[0]['Questionaire']['q2_email_address'],   
                    'style' => 'text-transform: uppercase; text-align:center;')) ?> </td>
                </tr>

            </table>
            <!--End of sub table-->

        </div></td>


<!-- SECTION 3 START  -->


        <td width="260px" style="margin: 0px">
        <div id="div_3">

            <h3>৩. ইউনিট প্রধান</h3>
            <hr />

            <table style="margin: 0px">
                <tr>
                    <th  width="200" height="23" style="border-right: 1px solid; border-bottom: 1px solid;"><span id="redmark">*</span>লিঙ্গ</th>
                    <th  width="200" style="border-right: 1px solid; border-bottom: 1px solid;"><span id="redmark">*</span>শিক্ষা</th>
                    <th  width="200" style="border-bottom: 1px solid;" scope="col"><span id="redmark">*</span>বয়স</th>
                </tr>
                <tr>
                    <td width="200"  height="186" style="border-right: 1px solid;">
                        <br /> 
                    পুরুষ...1 <br />
                    মহিলা...2 <br />
                    অন্যান্য...3 <br />
                     <br />
                    <?php echo $this -> Form -> input('q3_unit_head_gender', array(
                    'style' => 'width: 80px; text-align:center;', 
                    'label' => false,
                    'readonly' => 'readonly',
                    'value' => $questionaires[0]['Questionaire']['q3_unit_head_gender']  
                   )); 
                    ?>
                    </td>
                    
                    
                    <td width="200"  style="border-right: 1px solid;"> 
                    <br />
                    (শিক্ষা কোড <br />লিখুন)
                    <br /><br /> <br />
                    <?=$this -> Form -> input('q3_unit_head_education_id', array(
                    'label' => false,
                    'readonly' => 'readonly',
                    'value' => $edu_code[0]['UnitHeadEducation']['education_code'],  
                    'style' => 'width: 65px; text-align:center;', 
                    'maxlength' => 2, 
                    'minlength' => 2, 'type' => 'text')) ?> 
                    <div id="q3unitheadheducation"><?php echo  $edu_code[0]['UnitHeadEducation']['education_desc_bng'];?></div></td>
                    
                    
                    
                    <td width="200">
                    <br />
                    (পূর্ণ বছরে<br />লিখুন)
                    <br /><br /><br />
                    <?=$this -> Form -> input('q3_unit_head_age', array(
                    'label' => false,
                    'readonly' => 'readonly',
                    'value' => $questionaires[0]['Questionaire']['q3_unit_head_age'], 
                    'type' => 'text', 
                    'style' => 'width: 65px; text-align:center;', 
                    'maxlength' => 2, 'minlength' => 2)) ?> </td>
                </tr>
            </table>

        </div></td>
<!-- SECTION 4 START  -->
        <td width="200px">
        <div id="div_4">
            <h3>৪. ইউনিটের প্রকার</h3>
            <hr />
            <label><span id="redmark">*</span>ইউনিটের প্রকার</label>
            <hr /> <br />
            <?php echo $this -> Form -> input('q4_unit_type', array(
            'div' => true,
            'readonly' => 'readonly',
            'value' => $questionaires[0]['Questionaire']['q4_unit_type'],  
            'style' => 'width: 85px; text-align:center;',
            'required'=>'required', 
            'label' => false)); ?>
            <br/>
            
            <!--    <h3>প্রতিষ্ঠান হলে</h3> -->
            <div id = "div_4_1" >
                <hr />
                <label>প্রতিষ্ঠান হলে</label>
                <?php echo $this -> Form -> input('q4_unit_org_type', array(
                'div' => true, 
                'readonly' => 'readonly',
                'style' => 'width: 85px; text-align:center;', 
                'label' => false,
                'value' => $questionaires[0]['Questionaire']['q4_unit_org_type'])); ?>
            </div>
        </div></td>

        <td>
        <div id="div_5">

            <h3>৫. ইউনিটের প্রধান অর্থনৈতিক
            কর্মকাণ্ডের প্রকার</h3>
            <hr />
            <label>(কোড লিখুন)</label>
            <?=$this -> Form -> input('q5_unit_head_economy_id', array(
            'label' => false,
            'readonly' => 'readonly',
            'value' => $questionaires[0]['UnitHeadEconomy']['economy_code'],  
            'style' => 'width: 65px; text-align:center;', 
            'maxlength' => "2", 
            'minlength' => "2", 
            'type' => 'text')) ?>

            <?=$this -> Form -> input('economy_desc_bng', array(
            'label' => false,
            'readonly' => 'readonly',
            'value' => $questionaires[0]['UnitHeadEconomy']['economy_desc_bng'],  
            'type' => 'textarea',
            'style' => 'text-align:center;',  
            'disabled' => 'disabled')) ?>
        </div></td>

        <td>
        <div id="div_6">

            <h3><span id="redmark">*</span> ৬. ইউনিটের অর্থনৈতিক কর্মকাণ্ডের
            <br />
            বিস্তারিত বিবরণ ও শিল্প কোড লিখুন </h3>
            <hr />
            <?=$this -> Form -> input('q6_economy_description', array(
            'label' => false,
            'readonly' => 'readonly',
            'style' => 'text-align:center;',
            'value' => $questionaires[0]['Questionaire']['q6_economy_description'],  
            'required' => 'required', 
            'type' => 'textarea', )) ?>
            <label>শিল্প কোড লিখুন:</label>
            <?=$this -> Form -> input('q6_economy_id', array(
            'label' => false,
            'readonly' => 'readonly',
            'value' => $questionaires[0]['Questionaire']['q6_ind_code_class_id'],  
            'style' => 'width: 65px; text-align:center;', 
            'maxlength' => 4, 
            'minlength' => 4, 
            'type' => 'text')) ?>
        </div></td>

    </tr>

</table>

