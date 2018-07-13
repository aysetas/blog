İçeriğe geç

Search…
Tüm yumruklar
GitHub
 
Kod, not ve snippet'leri anında paylaşın.

26 3 @ roNn23roNn23 / laravel.js
çatallanmasının
JeffreyWay / laravel.js
Son aktif 4 months ago
 
<script src="https://gist.github.com/roNn23/a86f31ecaf0c6e0a7d65.js"></script>
  
 Kod Revizyonları 7 Yıldız 26 Forks 3
Laravel 5 ile çalışmak için Jeffrey Way'in silme komut dosyası güncellendi. Ve CSRF belirteci için uygulamayı optimize etti.
 laravel.js
/ *
 <a href="posts/2" data-method="delete"> <---- HTTP DELETE isteği göndermek istiyoruz
 - Veya süreçte onay isteme -
 <a href="posts/2" data-method="delete" data-confirm=" Emin misiniz ?">
 
 Bunu görünümünüze ekleyin:
  <Script>
		window.csrfToken = '<? php echo csrf_token (); ?> ';
  </ Script>
  <script src = "/ js / deleteHandler.js"> </ script>
 * /

( işlev () {

    var laravel = {
        başlat :  function () {
            bu . registerEvents ();
        },

        registerEvents :  işlev () {
            $ ( ' vücut ' ). on ( ' click ' , ' a [data-method] ' , bu . handleMethod );
        },

        handleMethod :  işlev ( e ) {
            var link =  $ ( this );
            var httpMethod =  link . veri ( ' yöntem ' ). toUpperCase ();
            var form;

            // Veri yöntemi özniteliği PUT veya DELETE değilse,
            // o zaman ne yapacağımızı bilmiyoruz. Görmezden gel.
            if ( $ . inArray (httpMethod, [ ' PUT ' , ' DELETE ' ]) ===  -  1 ) {
                dönüş ;
            }

            // Kullanıcının isteğe bağlı olarak veri sağlamasına izin ver = "Emin misiniz?"
            eğer ( link . data ( ' confirm ' )) {
                eğer ( !  laravel . verificationConfirm (link)) {
                     yanlış dönüş ;
                }
            }

            form =  laravel . createForm (bağlantı);
            Form . submit ();

            e . preventDefault ();
        },

        verifyConfirm :  işlev ( bağlantı ) {
            dönüş  teyidi ( link . data ( ' confirm ' ));
        },

        createForm :  işlev ( bağlantı ) {
            var form =
                $ ( ' <form> ' , {
                    ' method ' :  ' POST ' ,
                    ' eylem ' :  bağlantı . attr ( ' href ' )
                });

            var belirteci =
                $ ( ' <input> ' , {
                    ' name ' :  ' _token ' ,
                    ' type ' :  ' gizli ' ,
                    ' değer ' :  pencere . csrfToken
                });

            var hiddenInput =
                $ ( ' <input> ' , {
                    ' name ' :  ' _method ' ,
                    ' type ' :  ' gizli ' ,
                    ' değer ' :  bağlantı . veri ( ' yöntem ' )
                });

            dönüş  formu . ekleme (jeton, hiddenInput)
                . appendTo ( ' vücut ' );
        }
    };

    laravel . initialize ();

}) ();
 @dylanglockler
dylanglockler yorumladı 16 Nis 2015'te
Bu betiği seviyorum ve çalıştım ama şimdi bir sebepten dolayı aşağıda listelenen bir hata ile geri geliyor. Talimatları dikkatlice takip ettim - deletehandler.js ile bağlantılı ve csrf_token'i ekliyorum. JavaScript hatası almıyorum. Bunun nasıl düzeltileceği konusunda bir fikri olan var mı?

Laravel 5'deyim.

1/1 
: RouteCollection.php hattı 207 MethodNotAllowedHttpException 
RouteCollection.php hattı 207 
(( 'baş', 'POST') 'GET' dizi) RouteCollection.php hattı 194 RouteCollection- de> methodNotAllowed 
getRouteForMethods> RouteCollection- de ( 
Router.php line 
720'deki Router.php line 720'deki RouteCollection.php hattındaki RouteCollection.php satırında nesne (Request), array ('GET', 'HEAD', 'POST')) (İstek)) Router.php satırında Router.php 643 
Router-> dispatchToRoute (nesne (İstek)) Router.php satırında 619 
Router-> irsaliye (nesne (İstek)) 
Kernel-> Illuminate'de Kernel.php satırında 214 Call_user_func şirketinde Foundation \ Http {closure} (object (Request)) 
(nesne (Kapanış),nesne (İstek)) Pipeline.php satırında 141
Pipeline- de> Illuminate \ Boru {kapatma} VerifyCsrfToken.php hattı 43 (nesne (İstek)) 
VerifyCsrfToken.php hattı 17 VerifyCsrfToken- de> kolu (nesne (İstek), nesne (Kapatma)) 
VerifyCsrfToken- de> kolu ( ShareErrorsFromSession-> tutamacında (object (Request), object) ShareErrorsFromSession.php 
55 satırındaki Pipeline-> Illuminate \ Pipeline {closure} (nesne (İstek)) 'daki Pipeline.php satırında 125 nesne (İstek), nesne (Kapatma)) 
(Kapatma)) 
Pipeline -> Aydınlat \ Pipeline {closure} (nesne (İstek )) 'de Pipeline.php satırında (125) , Boru Hattı'ndaki StartSession.php satırında (61) (Satır 
(İstek), nesne (Kapanış)) AddQueuedCookiesToResponse.php satırında 
Pipeline-> Illuminate \ Pipeline {closure} (object (Request)) .php satır 125
sap (nesne (İstek), nesne (Kapatma)) Pipeline.php hattı 125> AddQueuedCookiesToResponse- de 
Pipeline- de> Illuminate \ Boru {kapatma} EncryptCookies.php hat 40 (nesne (İstek)) 
EncryptCookies- de> kolu ( CheckForMaintenanceMode-> tanıtıcısındaki 
CheckForMaintenanceMode.php satırında Pipeline -> Illuminate \ Pipeline {closure} (object (Request)) satırındaki Pipeline.php satırında 125 (object (Kapatma)) 
nesne (Request), object Pipeline.php hattı 125 (kapatma)) 
Pipeline- de> Illuminate \ Boru {kapatma} (nesne (İstek)) 
Pipeline.php hattı 101 call_user_func de (nesne (kapatma), nesne (ayrıntılı)) 
daha sonra Pipeline- de> Kernel.php satırında 
Kernel-> sendRequestThroughRouter öğesinde (object (Request)) Kernel.php satırında 115 (object (Closure))
index.php satırında Kernel-> tanıtıcısı (object (Request))

 @ Sp-99
sp-99 yorum yaptı 29 Tem 2015'te
Bağlantım sadece href'e bir istek isteği gönderir

 @hayalet
hayalet yorumladı 11 Kas 2015 tarihinde
Yani orada bir çözüm belirtisi yok. Github'a e-posta göndermeyi deneyeceğim.

 @ furqan99
furqan99 yorumladı 29 Mar 2016'da

hala belirteç uyumsuzluğu hatası alıyor

 @DanJFletcher
DanJFletcher yorum yaptı 20 Şub 2017 • 
Bu benim için iyi çalışıyor - teşekkürler!

Çocuklar, unutmadığınızdan emin olun:

  <script>
		window.csrfToken = '<?php echo csrf_token(); ?>';
  </script>
CSRF belirtecini sarmalayan alıntılar önemlidir. Aksi halde bu betik başarısız olur, dolayısıyla neden bir GET isteği gönderirsiniz.

 GitHub'da bu sohbete katılmak üye olun . Zaten hesabınız var mı? Yorum yapmak için giriş yapın
© 2018 GitHub , Inc.
şartlar
Gizlilik
Güvenlik
durum
yardım et
GitHub ile iletişime geçin
API
Eğitim
Dükkan
Blog
hakkında
Daha fazla ayrıntıyla bir hover kart açmak için h tuşuna basın.