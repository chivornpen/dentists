
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="border-radius:5px;">
        <div class="modal-header">
            Doctor Details
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="center">
                <img src='{{asset("/photo/$doctor->photo")}}' alt="" style="height: 120px; width: 120px; border-radius: 80px; border: 2px solid #346895; padding: 2px; margin: 0 auto;">
            </div>
            <br>
            <div style="margin: 0 10% 0 10%;">
                <table width="100%" border="0px" class="table table-condensed">
                    <tr>
                        <td>Doctor Name</td>
                        <td>{{$doctor->name}}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{$doctor->gender}}</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>{{$doctor->contact}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$doctor->email}}</td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td>{{$doctor->level}}</td>
                    </tr>
                    <tr>
                        <td>Commission</td>
                        <td>{{$doctor->commission}}</td>
                    </tr>
                    <tr>
                        <td>Base Salary</td>
                        <td>{{$doctor->baseSalary}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$doctor->address}}</td>
                    </tr>
                    <tr>
                        <td>Effect Date</td>
                        <td>{{$doctor->effectDate}}</td>
                    </tr>
                    <tr>
                        <td>End Date</td>
                        <td>{{$doctor->endDate}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>







