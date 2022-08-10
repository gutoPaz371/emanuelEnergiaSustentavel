<?php
    function delTree($dir) { 
        $files = array_diff(scandir($dir), array('.','..')); 
        foreach ($files as $file) { 
          (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        } 
        return rmdir($dir); 
      }
  
    delTree('banco');
    delTree('crud');
    #delTree('documentacao');
    delTree('gulp');
    delTree('public');
    delTree('src');
    unlink('index.php');
?>