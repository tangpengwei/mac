<?php
/**
 * Created by PhpStorm.
 * User: qingyun
 * Date: 19/4/30
 * Time: 下午2:00
 */

$img= imagecreatetruecolor(500 , 500);
imagefill($img,0,0,createColor($img));
$col_poly = imagecolorallocate($img, 255, 0, 0);
//imagepolygon($img,[200,1,200,0,1,300,400,100,1,100,300,300,200,1],7,$col_poly);

$b=100;

$pi=3.14/180;

$p1x = 150;

$p1y= 250;

$p2x = 150+(cos(36*$pi)*$b);

$p2y = 250-(sin(36*$pi)*$b);

$p3x = 150+(2*cos(36*$pi)*$b);

$p3y = 250;

$p4x = $p3x-sin(18*$pi)*$b;

$p4y = 250+cos(18*$pi)*$b;

$p5x = 150+sin(18*$pi)*$b;

$p5y = 250+cos(18*$pi)*$b;
imagefilledpolygon($img,[$p1x,$p1y,$p3x,$p3y,$p5x,$p5y,$p2x,$p2y,$p4x,$p4y],5,createColor($img));
for ($i=0;$i<20000;$i++){
    imagesetpixel($img,rand(0,500),rand(0,500),createColor($img));
}
for($i=0;$i<100;$i++)
{
    imageline($img,rand(0,500),rand(0,500),rand(0,500),rand(0,500),createColor($img));
}


for ($i=0;$i<1000;$i++){
    imagestring($img,5,rand(0,500),rand(0,500),'*',createColor($img));
}
$font_file = '../oop/2.ttf';

$cc = 0;
$aa = randString(1);
$bb = randString(1);
//for ($i=0;$i<4;$i++) {
//    $aa = randstring(1,0);
//    imagefttext($img,50,rand(0,100),100*($i+1),300,createColor($img,1),$font_file,$aa);
//    $cc .=$aa;
//}
imagefttext($img,50,rand(0,100),100,400,createColor($img,1),$font_file,$aa);
$cc += $aa;
imagefttext($img,50,0,200,400,createColor($img,1),$font_file,'+');
imagefttext($img,50,rand(0,100),300,400,createColor($img,1),$font_file,$bb);
$cc += $bb;
imagefttext($img,50,0,400,400,createColor($img,1),$font_file,'=');






header('content-type:image/png');

imagepng($img);

session_start();
$_SESSION['yanzhengma']=$cc;










function randstring ($num ,$type = 0){
    //十个数字
    $number='0123456789';
    //51
    $English = 'qwertyuiopasdfghjklzxcvbnmQWRTYUIOPASDFGHJKLZXCVBNM';
    //399
    $Chinese = '的,一,是,在,不,了,有,和,人,这,中,大,为,上,个,国,我,以,要,他,时,来,用,们,生,到,作,地,于,出,就,分,对,成,会,可,主,发,年,动,同,工,也,能,下,过,子,说,产,种,面,而,方,后,多,定,行,学,法,所,民,得,经,十,三,之,进,着,等,部,度,家,电,力,里,如,水,化,高,自,二,理,起,小,物,现,实,加,量,都,两,体,制,机,当,使,点,从,业,本,去,把,性,好,应,开,它,合,还,因,由,其,些,然,前,外,天,政,四,日,那,社,义,事,平,形,相,全,表,间,样,与,关,各,重,新,线,内,数,正,心,反,你,明,看,原,又,么,利,比,或,但,质,气,第,向,道,命,此,变,条,只,没,结,解,问,意,建,月,公,无,系,军,很,情,者,最,立,代,想,已,通,并,提,直,题,党,程,展,五,果,料,象,员,革,位,入,常,文,总';
    $str = '';
   for ($i = 0; $i < $num; $i++){
    if ($type == 0){
        $str.=rand(0,9);
    }
    if ($type == 1){
        $str.=$English{rand(0,50)};
    }
    if ($type == 2){
        $tmp = $number.$English;
        $str.=$tmp{rand(0,60)};
    }
    if ($type == 3){
        $tmp = explode(',',$Chinese);
        $str.=$tmp{rand(0,199)};
    }
   }

return $str;

}



//echo randstring(3,2);








function createColor($tu , $type=0){
    if ($type == 0){
        while (true){
            $x = rand(0,255);
            $y = rand(0,255);
            $z = rand(0,255);
            if ($x * 0.299 + $y * 0.587 + $z * 0.114 >= 192){
                return imagecolorallocate($tu,$x,$y,$z);
            }
        }
    }
    if ($type == 1){
        while(true){
            $x = rand(0,255);
            $y = rand(0,255);
            $z = rand(0,255);
            if ($x * 0.299 + $y * 0.587 + $z * 0.114 < 192){
                return imagecolorallocate($tu,$x,$y,$z);
            }
        }
    }
}

















