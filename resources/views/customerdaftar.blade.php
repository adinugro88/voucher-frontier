<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <style>
        body {
            width: 100%;
            height: 100vh;
            margin: 0;
            background-image: url('https://www.autofrontier.co.id/img/intro-carousel/sd2.jpg');
            color: #f5f6f7;
            font-family: Tahoma;
            font-size: 16px;
            text-align: center;
        }

        h1,
        p,img {
            margin: 1em auto;
            text-align: center;
        }

        form {
            width: 60vw;
            max-width: 500px;
            min-width: 300px;
            margin: 0 auto;
            padding-bottom: 2em;
        }

        fieldset {
            border: none;
            padding: 2rem 0;
            border-bottom: 3px solid #3b3b4f;
        }

        fieldset:last-of-type {
            border-bottom: none;
        }

        label {
            display: block;
            margin: 0.5rem 0;
        }

        input,
        textarea,
        select {
            margin: 10px 0 0 0;
            width: 100%;
            min-height: 2em;
        }

        input,
        textarea {
            background-color: #282727;
            border: 1px solid #ffffff;
            color: #ffffff;
            border-radius:10px;
            padding: 10px;
        }

        .inline {
            width: unset;
            margin: 0 0.5em 0 0;
            vertical-align: middle;
        }

        input[type="submit"] {
            display: block;
            width: 60%;
            margin: 1em auto;
            padding: 20px;
            font-size: 1.1rem;
            background-color: #3b3b4f;
            border-color: white;
            min-width: 300px;
        }

        input[type="file"] {
            padding: 1px 2px;
        }

        a {
            color: #dfdfe2
        }
    </style>
</head>

<body>

        <img src="https://www.autofrontier.co.id/img/logo.png" width="200" alt="">
        <h3>Claim Voucher Toko : {{$toko->nama_toko}}</h3>
        <p>Input data diri anda untuk mengaktfkan voucher</p>
        <form action='/claimcustomer' method="POST">
            @csrf
            <input type="text" name="idtoko" value="{{$toko->id}}" style="display: none" id="">
            <fieldset>
                <label for="first-name">Nama 
                    <input required id="first-name" name="nama" type="text"  />
                </label>
                <label for="last-name">No telpon <br> <input disabled type="text" placeholder="+62" style="width:20%;"> 
                     <input style="width:75%" required id="last-name" name="phone" type="number" min="0" max="999999999999999"/>
                </label>
                <label for="email">Email 
                    <input id="email" required name="email" type="email" required />
                </label>
                <label for="new-password">Alamat </label>
                <textarea name="alamat" id="" cols="10" rows="5"></textarea>
            </fieldset>
           
           
            <input type="submit" value="Submit" />
        </form>
    
  
</body>

</html>
