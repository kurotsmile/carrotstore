<?php
include "libary/midicomposer.class.php";
$midi_name_file_export="data_temp/piano_midi_".uniqid().uniqid().".mid";

$data_midi_index=json_decode($_POST['data_midi_index']);
$data_midi_type=json_decode($_POST['data_midi_type']);

$arr_midi_index_white=array("24","26","28","29","2B","2D","2F","30","32","34","35","37","39","3B","3C","3E","40","41","43","45","47","48","4A","4C","4D","4F","51","53","54","56","58","59","5B","5D","5F","60");
$arr_midi_index_black=array("25","27","2A","2C","2E","31","33","36","38","3A","3D","3F","42","44","46","49","4B","4E","50","52","55","57","5A","5C","5E","61","63","66");

$obj = new MIDIcomposer();

for($i_line=0;$i_line<count($data_midi_index);$i_line++){
	$data_line_index=$data_midi_index[$i_line];
	$data_line_type=$data_midi_type[$i_line];
	for($i_col=0;$i_col<count($data_line_index);$i_col++){
		$index_piano=$data_line_index[$i_col];			
		if($index_piano!=-1){
			$type_piano=$data_line_type[$i_col];
			if($type_piano==0){
				$obj->addnote($arr_midi_index_white[$index_piano], 1,127);
			}else{
				$obj->addnote($arr_midi_index_black[$index_piano], 1,127);
			}
			
		}
	}
}

$obj->save($midi_name_file_export);
echo $midi_name_file_export;
?>