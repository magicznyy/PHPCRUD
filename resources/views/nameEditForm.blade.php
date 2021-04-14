@include('layouts.navbar')
 
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>P(l)ain</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <style>
 
        body{
 
            background-image: url("/tai/public/images/background.jpg") ;
        }
        .title{
            text-align: center;
            background-color: transparent
        }
        .table-container{
            margin-top:10%;
           margin-left: 22%;
            background-color: white;
            max-width: 900px;
            text-align: center;
            padding:5%;
        }   
        .leftaside{
 
     color: grey;
    height: 40%;
    width: 10%;
    text-align: center;
    position:fixed;
    margin-top:3%;
    margin-bottom: 3%;
    margin-left:5%;
    margin-right: 82%;
    padding:0.5%;
 
    font-weight: bold;
        }
        .footer-button{
            background-color: transparent;
            float: right;
            margin-top: 3%;
        }
        table{
            margin-left: 8%;
            margin-right: 10%;
            margin-top: 5%;
            margin-bottom:5%;
            width: 80%;
        }
        .pic{
 
            padding-top:2%;
            margin-right:1%;
            text-align: center;
        }
 
        .fill{
            width:80%;
        }
 
 
        .share{
            text-align: right;
            margin-right: 5%;
        }
        .text{
            margin-left: 10%;
            margin-right: 10%;
            margin-bottom: 5%;
            padding-top: 5%;
 
        }
 
 
 
    </style>
</head>
<body>
    
 
 
 
    <div class="table-container">
        <h1>Edtuj imie:</h1>

  <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}"
 id="roles_box">
      
      
      
  <form role="form" id="comment-form" method="post" action="{{ route('store_name',\Auth::user() ) }}">
 {{ csrf_field() }}
 <input name="_method" type="hidden" value="PUT">
 <div class="box">
 <div class="box-body">
 <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}"
 id="roles_box">
 <label><b>Treść</b></label><br>
 <textarea name="message" id="message" cols="30" rows="10" required>

 </textarea>
 </div>
 </div>
 </div>
 <div class="box-footer">
 <button type="submit" class="btn btn-success">Zapisz</button>
 </div>
</form>
      
      
      
      
 </div>

</div>
 
</body>
</html>




 
