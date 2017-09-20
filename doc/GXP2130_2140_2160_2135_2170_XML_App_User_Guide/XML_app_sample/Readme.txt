======================================
Model
======================================
GXP2130/2140/2160




======================================
Firmware Version
======================================
1.0.5.29+


======================================
Note
======================================
1.Copy all testing files to your own server path "http://mypath.com".
2.Change server path on web UI->Setting->XML Application page to your own as "http://mypath.com/page1.xml".
3.Change the server path in 
Image "path", Softkey "commandArgs" and Event "commandArgs" to your own path.
For exmaple:
If your server path is "http://mypath.com”. Please change:

=========================
<SoftKeys>            
    <SoftKey action="UesURL" label="Next" commandArgs="http://192.168.40.179/page5.xml" />
	<SoftKey action="UseURL" label="Back" commandArgs="http://192.168.40.179/page3.xml" />
    <SoftKey action="QuitApp" label="Exit"/>
</SoftKeys>
==========================


to

==========================

<SoftKeys>            
    <SoftKey action="UesURL" label="Next" commandArgs="http://mypath.com/page5.xml" />
	<SoftKey action="UseURL" label="Back" commandArgs="http://mypath.com/page3.xml" />
    <SoftKey action="QuitApp" label="Exit"/>
</SoftKeys>

===========================
