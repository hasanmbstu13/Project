<?php
App::uses('Model','Model');
class BuildMaterialH extends Model{
    
    //public $actAs = array('Containable');
    
    public $useTable="build_of_material_h";
    
    public $hasMany = array('BuildMaterialL'=>array(
        'dependent' => true,
        'className'=>'BuildMaterialL',
        'foreignKey' => 'build_of_material_id'));
    
    public $belongsTo = array('ItemsRate'=>array(
        'className'=>'ItemsRate',
        'foreignKey' => 'item_rate_id'));
    
    public $validate = array(
	);
}