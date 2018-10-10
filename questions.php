<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">

    <title>Студия массажа Евгении Збишко</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">

    <script type="text/javascript">
      $(function() {
      $("#send").click(function(){
        var author = $("#author").val();
        var message = $("#message").val();                
      $.ajax({
        type: "POST",
        url: "sendMessage.php",
        data: {"author": author, "message": message},
        cache: false,                        
        success: function(response){
        var messageResp = new Array('Ваше сообщение отправлено','Сообщение не отправлено Ошибка базы данных','Нельзя отправлять пустые сообщения');
        var resultStat = messageResp[Number(response)];
        if(response == 0){
      $("#author").val("");
      $("#message").val("");
      $("#commentBlock").append("<div class='comment'>Автор: <strong>"+author+"</strong>"+date+"<br>"+message+"</div>");
        }
      $("#resp").text(resultStat).show().delay(1500).fadeOut(800);
        }});return false;});});
    </script>

  </head>

  <body>   

    <?php include ('connect.php');?>

<div class="background"></div>

    <div class="qestions">
      <div class="container">
        <div class="white-bg">
            <div class="not-index">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="flex-container">
                    <div class="flex-item">
                      <a href="index.html">Главная</a>
                    </div>
                    <div class="flex-item">
                      <a href="ourprices.html">Наши цены</a>
                    </div>
                    <div class="flex-item">
                      <a href="discounts.html">Акции</a>
                    </div>
                    <div class="flex-item">
                      <a href="сertificates.html">Сертификаты</a>
                    </div>
                    <div class="flex-item">
                      <a href="questions.html">Вопросы</a>
                    </div>
                    <div class="flex-item">
                      <a href="#">Отзывы</a>
                    </div>
                    <div class="flex-item">
                      <a href="contacts.html">Контакты</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /строка c меню -->
            
            <!-- блок вопросов и ответов -->
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div id="commentBlock">
                  <?php
                  
                  $result = mysql_query("SELECT * FROM messages ORDER BY date DESC",$db);
                  $comment = mysql_fetch_array($result);
                  do{
                  echo "<div class='comment'> <strong>".$comment['author']."</strong>   <span class='qs-date'>".$comment['date']."</span><br>".$comment['message']."</div>";
                  }while($comment = mysql_fetch_array($result));
                  ?>
                
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-8 col-lg-0ffset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                <div class="contact-form">
                  <form action="sendMessage.php" method="post" name="form">
                      <label for="#">Ваше имя</label>
                      <input class="contact-form-input form-control input-lg" name="author" type="text" id="author">
                      <label for="#">Текст сообщения</label>
                      <textarea class="form-control" name="message" rows="5" cols="50" id="message"></textarea>
                      <input name="js" type="hidden" value="no" id="js">
                      <input type="hidden" name="page_id" value="1" />
                      <button class="contact-form-btn btn btn-lg" name="button" type="submit" value="Отправить" id="send">Отправить</button> <span id="resp"></span>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>


    <footer>
        <div class="container">
         <div class="footer">  
          <div class="row">
            <div class="col-lg-3 col-md-4">
              <div class="footer-info">
                <h4>Студия массажа Евгении Збишко</h4>
                <p><a href="about-massage.html">Массаж</a></p>
                <p><a href="#">Шугаринг</a></p>
              </div>
            </div>
              <div class="col-lg-6 col-md-4">
                <div class="footer-socials">
                  <div class="footer-socials-img">
                    <a href="#">
                      <picture>
                        <source srcset="img/vk.svg" type="image/">
                        <img src="img/vk.png" alt="Вконтакте">
                      </picture>
                    </a>
                  </div>
                  <div class="footer-socials-img">
                    <a href="#">
                      <picture class="socials-img">
                        <source srcset="img/ok.svg" type="image/">
                        <img src="img/ok.png" alt="Одноклассники">
                      </picture>
      
                    </a>            </div>
                  <div class="footer-socials-img">
                    <a href="#">
                      <picture class="socials-img">
                        <source srcset="img/insta.svg" type="image/">
                        <img src="img/insta.png" alt="Инстаграм">
                      </picture>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-md-offset-1">
                <div class="footer-address">
                  <h4>г.Красноярск</h4>
                  <h4>Батурина 20</h4>
                  <p><a href="tel:2713103">2-713-103</a></p>
                  <p><a href="tel:2770377">277-03-77</a></p>
                </div>
              </div>
          </div>
         </div>  
        </div>
          
      </footer>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  
    <script src="js/jquery-1.5.1.min.js"></script>
    <script src="js/main.js"></script>
    
 </body>
</html>