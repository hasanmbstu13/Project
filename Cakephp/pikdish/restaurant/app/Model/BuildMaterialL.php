<?php
App::uses('Model','Model');
class BuildMaterialL extends Model{
    
    public $useTable="build_of_material_l";
    
    public $belongsTo = array('BuildMaterialH'=>array(
        'className'=>'BuildMaterialH',
        'foreignKey' => 'build_of_material_id'));
}