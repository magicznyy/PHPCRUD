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
            background-color: white;
            max-width: 900px;
            margin: 0 auto;
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
        <h1>Mój Profil:</h1>

 <br>
 <div>
     <div>
         
           <?php
        if(file_exists('C:/xampp/htdocs/tai/public/images/'.\Auth::user()->id.'.jpg'))
        echo '<img src="/tai/public/images/'.\Auth::user()->id.'.jpg"  alt="sratatata" width="100"  height="100">';
        else 
           echo '<img src="/tai/public/images/jobs.jpg"  alt="sratatata" width="100"  height="100">'; 
        ?>
         <br>
         @ {{\Auth::user()->nick}}
         
         
         
     </div>
    <br>
     <div>
         <h1>Dane użytkownika:</h1><br>
         <a><b>Imię:</b> &nbsp {{\Auth::user()->name}}</a> 
         <a><form action="{{ route('edit_name') }}" method="get"  >
                                    @csrf
                                   
                                    <button type="submit" class="btn btn-primary"  
                                            title="Edittt"> Edytuj  </button> 
             </form> </a>
         
         <a><b>Nazwisko:</b> &nbsp {{\Auth::user()->surname}}</a> 
         <form action="{{ route('edit_name') }}" method="get"  >
                                    @csrf
                                    <button type="submit" class="btn btn-primary"  
                                            title="Edit"> Edytuj  </button> 
             </form> 
         
         <a><b> E-mail:</b> &nbsp {{\Auth::user()->email}}</a> 
         <a><form action="{{ route('edit_name') }}" method="get"  >
                                    @csrf
                                    
                                    <button type="submit" class="btn btn-primary"  
                                            title="Edit"> Edytuj  </button> 
             </form> </a>
       
         <a><b>Konto utworzono:</b> &nbsp {{\Auth::user()->created_at}}</a><br><br><br>
         
     </div>
     
      <div class="panel panel-primary">
          <a><b>Aktualizuj zdjęcie profilowe:</b></a>
      <div class="panel-body">
     
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
        @endif
    
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
    
                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div>
     
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
     
            </div>
        </form>
    
      </div>
    </div>
     <br><br><br>
     
     <div>
         <h1>Utowrzone posty:</h1>
         
         <table style="margin-left:0" data-toggle="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Użytkownik</th>
                    <th>Data dodania</th>
                    <th>Komentarz</th>
                </tr>
            
            </thead>
            <tbody>
                @foreach($comments as $comment)
                @if($comment->user_id == \Auth::user()->id)
                <tr>
                    
            <td>  <?php
                         if(file_exists('C:/xampp/htdocs/tai/public/images/'.\Auth::user()->id.'.jpg'))
                                 echo '<img src="/tai/public/images/'.\Auth::user()->id.'.jpg"  alt="sratatata" width="100"  height="100">';
                         else 
                                 echo '<img src="/tai/public/images/jobs.jpg"  alt="sratatata" width="100"  height="100">'; 
                     ?>
            </td>
             <td>{{$comment->user->nick}}</td>  
              <td>{{$comment->created_at}}</td>   
               <td>{{$comment->message}} 
                   <br /> @if($comment->user_id == \Auth::user()->id)
 
 @endif</td>
               </tr>
   
               <tr>
                   
                  
                           
            </tr>
            @endif
               @endforeach
             </tbody>
             
        </table>
         
         
         
     </div>
 </div>
       

</div>
 
</body>
</html>




 
