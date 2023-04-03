<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
        }
        body{
            background: White;
        }
        .header{
            height: 170px;
            width: 100%;
        }
        .header_image{
            height: 100%;
            width: 25%;

        }
        .header_title{
            height: 100%;
            width: 50%;
            text-align: center;
        }
        .header_address{
            height: 100%;
            width: 25%;
        }
        .table{

        }
        .sign{
            border: 1px solid black;
        }
    </style>
</head>
<body>
@foreach($data as $key)

<div class="header">
    <div class="header_image" style="float:left">
        <img class="sign" src="{{ $key->image }}" width="90%" height="90%" alt="pp photo">
    </div>
    <div class="header_title" style="float:left">
        <img src="{{ public_path('img/dmp.jpg')  }}" width="30px" height="30px" style="margin-top: 35px" alt="pp photo">
        <span>Dhaka Metropolitan Police</span>
        <br>
        <span>District: {{ $key->district }}</span>
        <br>
        <span>Thana: {{ $key->thana }}</span>
        <br><br>
        <span><u>Tenant Registration Form Number: {{ $key->id }}</u></span>
    </div>
    <div class="header_address" style="float:left">
        <br>
        <span>Floor: {{ $key->floor }}</span><br>
        <span>Holding: {{ $key->holding }}</span><br>
        <span>Road: {{ $key->road }}</span><br>
        <span>Area: {{ $key->area }}</span><br>
        <span>Post Code: {{ $key->post_code }}</span>
    </div>
</div>
<div class="details">
    <table class="table">
        <tr>
            <td colspan="4"><span>1. Tenant Name : {{ $key->name  }}</span></td>
        </tr>
        <tr>
            <td colspan="4"><span>2. Father's Name : {{ $key->father_name  }}</span></td>
        </tr>
        <tr>
            <td colspan="4"><span>3. Date of Birth : {{ $key->dob  }}</span></td>
        </tr>
        <tr>
            <td colspan="4"><span>4. Marital Status : {{ $key->marital_status  }}</span></td>
        </tr>
        <tr>
            <td colspan="4"><span>5. Permanent Address : {{ $key->address  }}</span></td>
        </tr>
        <tr>
            <td colspan="4"><span>6. Occupation and Institution : {{ $key->occupation  }}/{{ $key->institution  }}</span></td>
        </tr>
        <tr>
            <td colspan="4"><span>7. Religion : {{ $key->religion  }}</span></td>
        </tr>
        <tr>
            <td colspan="4"><span>8. Educational Qualification : {{ $key->education  }}</span></td>
        </tr>
        <tr>
            <td colspan="4"><span>9. Mobile Number : {{ $key->phone  }}</span></td>
        </tr>
        <tr>
            <td colspan="4"><span>10. Email : </span></td>
        </tr>
        <tr>
            <td colspan="4"><span>11. National Id Number: {{ $key->nid  }}</span></td>
        </tr>
        <tr>
            <td><span>13. Emergency Contact :</span></td>
        </tr>
        <tr>
            <td colspan="2"><span>Name : {{ $key->ec_name  }}</span></td>
            <td colspan="2"><span>Relationship : {{ $key->ec_relationship  }}</span></td>
        </tr>
        <tr>
            <td colspan="2"><span>Address : {{ $key->ec_address  }}</span></td>
            <td colspan="2"><span>Mobile : {{ $key->ec_phone  }}</span></td>
        </tr>
        <tr>
            <td><span>14. Family Member Name :</span></td>
        </tr>
        <tr>
            <td colspan="2"><span>Name :{{ $key->fm_name  }}</span></td>
            <td colspan="2"><span>Age :{{ $key->fm_age  }}</span></td>
        </tr>
        <tr>
            <td colspan="2"><span>Occupation :{{ $key->fm_occupation  }}</span></td>
            <td colspan="2"><span>Mobile :{{ $key->fm_phone  }}</span></td>
        </tr>
        <tr>
            <td><span>15. Home Worker Contact :</span></td>
        </tr>
        <tr>
            <td colspan="2"><span>Name : {{ $key->hw_name  }}</span></td>
            <td colspan="2"><span>Nid Number : {{ $key->hw_nid  }}</span></td>
        </tr>
        <tr>
            <td colspan="2"><span>Address : {{ $key->hw_address  }}</span></td>
            <td colspan="2"><span>Mobile : {{ $key->hw_phone  }}</span></td>
        </tr>
        <tr>
            <td><span>15. Driver Contact :</span></td>
        </tr>
        <tr>
            <td colspan="2"><span>Name : {{ $key->d_name  }}</span></td>
            <td colspan="2"><span>Nid Number : {{ $key->d_nid  }}</span></td>
        </tr>
        <tr>
            <td colspan="2"><span>Address : {{ $key->d_address  }}</span></td>
            <td colspan="2"><span>Mobile : {{ $key->d_phone  }}</span></td>
        </tr>
        <tr>
            <td><span>16. Previous House Owner Contact :</span></td>
        </tr>
        <tr>
            <td colspan="2"><span>Name : {{ $key->pho_name  }}</span></td>
            <td colspan="2"><span>Address : {{ $key->pho_address  }}</span></td>
        </tr>
        <tr>
            <td colspan="2"><span></span></td>
            <td colspan="2"><span>Mobile : {{ $key->pho_phone  }}</span></td>
        </tr>
        <tr>
            <td colspan="2">
                <span>Tenant Signature</span>
                <br>
                <img class="sign" src="{{ $key->sign }}" width="150px" height="50px" alt="sign" style="">
            </td>
        </tr>
        <br>
    </table>
    <hr>
    <span>Note : The Home Owner must collect a copy of this form</span>
</div>
@endforeach
</body>
</html>
