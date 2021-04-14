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
            margin-top: 2%;
            margin-bottom:2%;
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
        .time_ago{
            font-weight: normal;
        }
        
        
        
 
 
    </style>
</head>
<body>
     <aside class="leftaside">
             <?php
                        if(file_exists('C:/xampp/htdocs/tai/public/images/'.\Auth::user()->id.'.jpg'))
                             echo '<img src="/tai/public/images/'.\Auth::user()->id.'.jpg"  alt="sratatata" width="100"  height="100">';
                         else 
                               echo '<img src="/tai/public/images/jobs.jpg"  alt="sratatata" width="100"  height="100">'; 
                         ?>
                        <br>
                        <a href="{{ route('profile') }}">{{ \Auth::user()->nick}} </a>
 
 
                        <br><br><br><br><br><br>
            @if(\Auth::user()->admin)
            <a href="{{ route('reports') }}"> Zgłoszone posty  </a><br>
            @endif
      

 
        </aside>
 
 
 
    <div class="table-container">
 
      
        @auth
 
 
            <div class="text">
             
   <form role="form"  action="{{ route('store') }}" id="comment-form" 
                   method="post" enctype="multipart/form-data" >
               {{ csrf_field() }}
               <div class="box">
                 <div class="box-body">
                   <div class="form-group{{ $errors->has('message')?'has-error':'' }}" id="roles_box">
                    <label><b>Treść</b></label> <br>
                     <textarea name="message"  id="message" style="resize: none" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                   </div>
                 </div>
                </div>
              <div class="box-footer"><button type="submit" class="btn btn-success">Utwórz</button> 
              </div>
             </form>
           
   
       
                
           
 
      </div>
   
     
     
      
               
  
  <br>
     <hr style="width:100%;text-align:left;margin-left:0">
 

 
                @foreach($comments as $comment)
 
 
                <table border="1">
                    <th> <a class="time_ago">{{$comment->created_at->diffForHumans()}}</a> </th>
                    <th></th>
                    <th class="fill"></th>
                    <th style="padding-top:2.5%">
                          <form action="{{ route('report',$comment->id) }}" method="post"  >
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning"  
                                            title="Report">Zgloś</button></form> 
                    </th>
                    <th> 
                        @if(\Auth::user()->id==$comment->user_id)<a href="{{ route('edit', $comment) }}" class="btn btn-success btn-xs"
                      title="Edytuj">Edytuj</a></th>
               
                    @endif
                    <th> @if($comment->user_id == \Auth::user()->id)
 <a href="{{ route('delete', $comment->id) }}"
 class="btn btn-danger btn-xs"
 onclick="return confirm('Jesteś pewien?')"
title="Skasuj"> &#10060;
 </a>
                        @endif</th>
                    <tr> 
                    <td class="pic">  
                    <?php
                        if(file_exists('C:/xampp/htdocs/tai/public/images/'.$comment->user_id.'.jpg'))
                             echo '<img src="/tai/public/images/'.$comment->user_id.'.jpg"  alt="sratatata" width="100"  height="100">';
                         else 
                               echo '<img src="/tai/public/images/jobs.jpg"  alt="sratatata" width="100"  height="100">'; 
                  ?>
                        <br>
                        <a>{{$comment->user->nick}}</a> 
                    </td>
                    <td></td>
                    <td colspan="5" style="width:80%; padding-left: 2%" > {{$comment->message}} </td>
                    </tr>
                    <tr>
 
                     </tr>
 
                    <tr>
                        <td style="width:2%"></td>
                        <td></td>
 
 
 
                        <td class="fill"></td>
 
 
                        <td style="padding-top:2.5%">
                           <form action="{{ route('dislike', $comment->id) }}" method="post"  >
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary"  
                                        title="Dislike"> &#128078;<span class="badge badge-light">{{$comment->dislikes}}</span> 
                               </form> 
                        </td>
                        <td>
                            <div class="button">
<a href="{{ route('create') }}" class="btn btn-secondary">Odpowiedz</a>
</div>
                        </td>
 
                    </tr>
              </table>
 
                <hr style="width:100%;text-align:left;margin-left:0">
 
 
               @endforeach
              
          {{$comments->links()}}
              
         @endauth
        <br>       
 
    </div>     
 
    @guest
    <div class="table-container">
        <b>Zaloguj się aby przejrzeć komentarze.</b>
    </div>    
    @endguest
 
 
</body>
</html>