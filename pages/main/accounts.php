<div class="form-add">
    <div class="form-heading">
        <h2>ACCOUNT</h2>
    </div>
    <form action="">
        <table> 
            <tr>
                <th>AVATAR</th>
                <td>
                    <input class="input" type="file">
                </td>
            </tr>
            <tr>
                <th>USERNAME</th>
                <td>
                    <input class="input" type="text">
                </td>
            </tr>
            <tr>
                <th>PASSWORD</th>
                <td>
                    <input class="input" type="password">
                </td>
            </tr>
            <tr>
                <th>FIRST NAME</th>
                <td>
                    <input class="input" type="text">
                </td>
            </tr>
            <tr>
                <th>LAST NAME</th>
                <td>
                    <input class="input" type="text">
                </td>
            </tr>
            <tr>
                <th>GENDER</th>
                <td>
                    <input type="radio" name="gender" id="">Male
                    <input type="radio" name="gender" id="">Female
                    <input type="radio" name="gender" id="">Others
                </td>
            </tr>
            <tr>
                <th>BIRTH</th>
                <td>
                    <input class="input" type="date">
                </td>
            </tr>
            <tr>
                <th>ADDRESS</th>
                <td>
                    <input class="input" type="text">
                </td>
            </tr>
            <tr>
                <th>PHONE</th>
                <td>
                    <input class="input" type="text">
                </td>
            </tr>
            <tr>
                <th>SALARY</th>
                <td>
                    <input class="input" type="number">
                </td>
            </tr>
            <tr>
                <th>TYPE</th>
                <td>
                    <select name="" class="input" id="">
                        <option value="0">Staff</option>
                        <option value="1">Manager</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="" class="input" id="" value="ADD">
                    <input type="submit" name="" class="input" id="" value="UPDATE">
                    <input type="submit" name="" class="input" id="" value="REMOVE">
                </td>
            </tr>
        </table>
    </form>
</div>

<div class="table-right">
    <div class="search-bar">
        <input type="text" class="input" placeholder="Search...">
    </div>
    <table>
        <thead>
            <tr>
                <th style="text-align: center; width: 70px;">NO.</th>
                <th>AVATAR</th>
                <th style="text-align: left; width:  calc(100%/5);">NAME</th>
                <th style="text-align: right; width:  calc(100%/6);">BIRTH</th>
                <th style="text-align: center; width:  calc(100%/7);">PHONE</th>
                <th style="text-align: center; width:  calc(100%/7);">SALARY</th>
                <th style="text-align: center; width:  calc(100%/7);">TYPE</th>
            </tr>
        </thead>
        <tbody>     
            <tr>
                <td style="text-align: center; width: 70px;">1</td>
                <td style="text-align: center; width: 150px;"><img src="./img/1653115824_zyro-image.png" alt=""></td>
                <td style="text-align: left; width:  calc(100%/5);">Nguyễn Minh Huy</td>
                <td style="text-align: right; width:  calc(100%/6);">02/12/2002</td>
                <td style="text-align: center; width:  calc(100%/7);">0938745593</td>
                <td style="text-align: center; width:  calc(100%/7);">15.000.000đ</td>
                <td style="text-align: center; width:  calc(100%/7);">Manager</td>
            </tr>  
            <tr>
                <td style="text-align: center; width: 70px;">2</td>
                <td style="text-align: center; width: 150px;"><img src="./img/1653115824_zyro-image.png" alt=""></td>
                <td style="text-align: left; width:  calc(100%/5);">Nguyễn Minh Huy</td>
                <td style="text-align: right; width:  calc(100%/6);">02/12/2002</td>
                <td style="text-align: center; width:  calc(100%/7);">0938745593</td>
                <td style="text-align: center; width:  calc(100%/7);">5.000.000đ</td>
                <td style="text-align: center; width:  calc(100%/7);">Staff</td>
            </tr>
            <tr>
                <td colspan="7">
                    <span>1</span> 
                </td>
            </tr>
        </tbody>
    </table>
</div>