# Buto-Plugin-PhpExec
Use exec to run commands on server.

## Widget
```
type: widget
data:
  plugin: php/exec
  method: exec
  data:
    command: 
      - 'cd /Volumes && ls -la'
```
Result.
```
plugin: php/exec
method: exec
data:
  command:
    - 'cd /Volumes && ls -la'
  result:
    -
      run: 'cd /Volumes && ls -la'
      command: 'lrwxr-xr-x   1 root  wheel    1 Feb 24 18:11 Macintosh HD -> /'
      output:
        - 'total 0'
        - 'drwxr-xr-x   3 root  wheel   96 May  9 10:26 .'
        - 'drwxr-xr-x  23 root  wheel  736 Dec 25 11:02 ..'
        - 'lrwxr-xr-x   1 root  wheel    1 Feb 24 18:11 Macintosh HD -> /'
      result_code: 0
file: /................/PluginPhpExec.php
```

## PHP code
```
wfPlugin::includeonce('php/exec');
$exec = new PluginPhpExec();
wfHelp::yml_dump($exec->exec('cd /Volumes && ls -la'));
```
Result.
```
run: 'cd /Volumes && ls -la'
command: 'lrwxr-xr-x   1 root  wheel    1 Feb 24 18:11 Macintosh HD -> /'
output:
  - 'total 0'
  - 'drwxr-xr-x   3 root  wheel   96 May  9 10:26 .'
  - 'drwxr-xr-x  23 root  wheel  736 Dec 25 11:02 ..'
  - 'lrwxr-xr-x   1 root  wheel    1 Feb 24 18:11 Macintosh HD -> /'
result_code: 0
```

## Enabled exec in php.ini
Command exec can be disabled in your php.ini file. Check param disable_functions. Remove exec if exist.
### php.ini
```
disable_functions = exec
```
