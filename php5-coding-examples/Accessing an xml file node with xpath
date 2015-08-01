<?php

$str = <<< EOT

<roles>
    <task type="analysis">
        <state name="new">
            <assigned to="cto">
                <action newstate="clarify" assignedto="pm">
                    <notify>pm</notify>
                    <notify>cto</notify>
                </action>
                <action newstate="clarify2" assignedto="pm2">
                    <notify>pm2</notify>
                    <notify>cto2</notify>
                </action>
            </assigned>
        </state>
        <state name="clarify">
            <assigned to="pm">
                <action newstate="clarify3" assignedto="pm3">
                    <notify>cto</notify>
                </action>
            </assigned>
        </state>
    </task>
</roles>

EOT;

$s = simplexml_load_string($str);

$node = $s->xpath("//task[@type='analysis']/state[@name='new']/assigned[@to='cto']");

echo $node[0]->action[0]['newstate'] . "<br/>"; //output: clarify

echo $node[0]->action[1]['newstate'] . "<br/>"; //output: clarify2

echo $node[0]->action[0]->notify[0] . "<br/>";  //output: pm

echo $node[0]->action[1]->notify[1] . "<br/>";  //output: cto2


?>

