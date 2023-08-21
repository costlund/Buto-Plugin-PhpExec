<?php
class PluginPhpExec{
  public function widget_exec($data){
    /**
     */
    $data = new PluginWfArray($data);
    /**
     */
    if(!is_array($data->get('data/command'))){
        $data->set('data/command', array($data->get('data/command')));
    }
    /**
     */
    $result = array();
    foreach($data->get('data/command') as $v){
     $result[] = $this->exec($v);
    }
    $data->set('data/result', $result);
    /*
     * Dump
     */
    wfHelp::yml_dump($data);
  }
  public function exec($v){
    $output = array();
    $result_code = null;
    $command = exec($v, $output, $result_code);
    return array('run' => $v, 'command' => $command, 'output' => $output, 'result_code' => $result_code);
 }
}
