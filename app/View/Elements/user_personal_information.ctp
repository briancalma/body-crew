<table>
    <tr>
        <td>
            <?php 
                if( empty($data['User']['profileimgpath']) ) $data['User']['profileimgpath'] = '/img/default_user.png';
                echo $this->Html->image($data['User']['profileimgpath'],['style' => 'width:100px;height:100px;']); 
                echo "<br>".$this->Html->link('Change Profile Picture',['action' => 'change_profile_pic']);
            ?>
        </td>
        <td>
            <ul style="list-style-type:none;">
                <li><b>Username</b>  : <?= ucfirst( $auth->user('username') );?></li>
                <li><b>Firstname</b> : <?= ucfirst( $data['User']['firstname'] );?></li>
                <li><b>Lastname</b>  : <?= ucfirst( $data['User']['lastname'] );?></li>
                <li><b>Age</b>       : <?php 
                                            $temp = explode('-',$data['User']['birthdate']);
                                            $year = $temp[0];
                                            echo date("Y") - (int)$year;
                                       ?>
                </li>
                <li><b>Birthday</b>  : <?= $data['User']['birthdate'];?></li>
            </ul>
        </td>
    </tr>
</table>