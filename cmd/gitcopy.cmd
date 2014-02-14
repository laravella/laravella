del c:\xampp\htdocs\lv\crud\* /A:-R
del c:\xampp\htdocs\lv\cart\* /A:-R
del c:\xampp\htdocs\lv\cms\* /A:-R
del c:\xampp\htdocs\lv\skins\* /A:-R
del c:\xampp\htdocs\lv\uploader\* /A:-R

xcopy c:\xampp\htdocs\laravella\vendor\laravella\crud\* c:\xampp\htdocs\lv\crud\ /E/Y
xcopy c:\xampp\htdocs\laravella\vendor\laravella\cart\* c:\xampp\htdocs\lv\cart\ /E/Y
xcopy c:\xampp\htdocs\laravella\vendor\laravella\cms\* c:\xampp\htdocs\lv\cms\ /E/Y
xcopy c:\xampp\htdocs\laravella\vendor\laravella\skins\* c:\xampp\htdocs\lv\skins\ /E/Y
xcopy c:\xampp\htdocs\laravella\vendor\laravella\uploader\* c:\xampp\htdocs\lv\uploader\ /E/Y
