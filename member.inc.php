<?php
if (!defined('INDEX_AUTH')) {
    die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
    die("can not access this file directly");
}
$is_member_login = utility::isMemberLogin();
require SIMBIO . 'simbio_DB/simbio_dbop.inc.php';
function toordinal(){
	$a = new DateTime(strval(date("Y-m-d h:i:s")));
	$awal = new Datetime("0001-01-01");
	$d = $a->diff($awal)->days + 1;
	return strval($d)."abubakar";
}
function hash_password(string $data) {
	$x = utf8_decode(base64_encode(sha1($data,true)));
	$z = "{SHA}$x";
	$f = utf8_decode(hash('sha256',$z.toordinal()));
	return $f;
}
if (isset($_GET['logout']) && $_GET['logout'] == '1') {
    // write log
    //utility::writeLogs($dbs, 'member', $_SESSION['email'], 'Login', $_SESSION['member_name'] . ' Log Out from address ' . $_SERVER['REMOTE_ADDR']);
    // completely destroy session cookie
    simbio_security::destroySessionCookie(null, MEMBER_COOKIES_NAME, SWB, false);
    header('Location: index.php?p=member');
    header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header('Pragma: no-cache');
    exit();
}


if (isset($_POST['logMeIn']) && !$is_member_login){
    $nim = $_POST['nim'];
    $passwd = $_POST['password'];
    $url = 'https://sso.umkt.ac.id/api/login-cek/';
    $data = array('username' => $nim, 'password' => strval(hash_password($passwd)));
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = json_decode(file_get_contents($url, false, $context));
    $sql = sprintf("SELECT * FROM member where member_id = '%s';",$nim);

    $hasil = $dbs->query($sql);
    $nama = $result->rows->nama;
    $nim_sso = $result->rows->uid;
    $hp = $result->rows->hp; 
    $email = $result->rows->mail;
    $prodi = $result->rows->homebase;
    $query = 'INSERT INTO member (member_id,member_name,member_email,member_phone,gender,expire_date) VALUES ("'.$nim_sso.'","'.$nama.'","'.$email.'","'.$hp.'","1","2025-01-01");';
    if (($result->status) == true){
        if ($hasil->num_rows > 0){
            $row = mysqli_fetch_assoc($hasil);
            if(($row['member_id']) == $nim){
                //var_dump($row);
                //$login += 1;
            }else{
                //$login = 0;
            }
        }else{
            //$login += 1;
            $dbs->query($query);
        }
            $_SESSION['mid'] = $nim;
            $_SESSION['m_name'] = $nama;
            $_SESSION['m_email'] = $email;
            $_SESSION['m_institution'] = $prodi;
            $_SESSION['m_logintime'] = time();
            $_SESSION['m_expire_date'] = $row['expire_date'];
            $_SESSION['m_member_type_id'] = $row['member_type_id'];
            $_SESSION['m_member_type'] = $row['member_type_name'];
            $_SESSION['m_register_date'] = $row['register_date'];
            $_SESSION['m_membership_pending'] = intval($row['is_pending'])?true:false;
            $_SESSION['m_is_expired'] = false;
            $_SESSION['m_mark_biblio'] = array();
            $_SESSION['m_can_reserve'] = $row['enable_reserve'];
            $_SESSION['m_reserve_limit'] = $row['reserve_limit'];
            $_SESSION['m_image'] = $row['member_image'];
            header('Location: index.php?p=member');
    }else{
        //$login = 0;
    }
}
//sini
if ($is_member_login) :

    $member_image = $_SESSION['m_image'] && file_exists(IMGBS . 'persons/' . $_SESSION['m_image']) ? $_SESSION['m_image'] : 'person.png';

    // require file
    require SIMBIO . 'simbio_GUI/table/simbio_table.inc.php';
    require SIMBIO . 'simbio_DB/datagrid/simbio_dbgrid.inc.php';
    require SIMBIO . 'simbio_GUI/paging/simbio_paging.inc.php';
    require SIMBIO . 'simbio_UTILS/simbio_date.inc.php';

    /*
       * Function to show membership detail of logged in member
       *
       * @return      string
       */
    function showMemberDetail()
    {
        // show the member information
        $_detail = '<table class="memberDetail table table-striped" cellpadding="5" cellspacing="0">' . "\n";
        // member notes and pending information
        if ($_SESSION['m_membership_pending'] || $_SESSION['m_is_expired']) {
            $_detail .= '<tr>' . "\n";
            $_detail .= '<td class="key alterCell" width="15%"><strong>Notes</strong></td><td class="value alterCell2" colspan="3">';
            if ($_SESSION['m_is_expired']) {
                $_detail .= '<div style="color: #f00;">' . __('Your Membership Already EXPIRED! Please extend your membership.') . '</div>';
            }
            if ($_SESSION['m_membership_pending']) {
                $_detail .= '<div style="color: #f00;">' . __('Membership currently in pending state, no loan transaction can be made yet.') . '</div>';
            }
            $_detail .= '</td>';
            $_detail .= '</tr>' . "\n";
        }
        $_detail .= '<tr>' . "\n";
        $_detail .= '<td class="key alterCell" width="15%"><strong>' . __('Member Name') . '</strong></td><td class="value alterCell2" width="30%">' . $_SESSION['m_name'] . '</td>';
        $_detail .= '<td class="key alterCell" width="15%"><strong>' . __('Member ID') . '</strong></td><td class="value alterCell2" width="30%">' . $_SESSION['mid'] . '</td>';
        $_detail .= '</tr>' . "\n";
        $_detail .= '<tr>' . "\n";
        $_detail .= '<td class="key alterCell" width="15%"><strong>' . __('Member Email') . '</strong></td><td class="value alterCell2" width="30%">' . $_SESSION['m_email'] . '</td>';
        $_detail .= '<td class="key alterCell" width="15%"><strong>' . __('Member Type') . '</strong></td><td class="value alterCell2" width="30%">' . $_SESSION['m_member_type'] . '</td>';
        $_detail .= '</tr>' . "\n";
        $_detail .= '<tr>' . "\n";
        $_detail .= '<td class="key alterCell" width="15%"><strong>' . __('Register Date') . '</strong></td><td class="value alterCell2" width="30%">' . $_SESSION['m_register_date'] . '</td>';
        $_detail .= '<td class="key alterCell" width="15%"><strong>' . __('Expiry Date') . '</strong></td><td class="value alterCell2" width="30%">' . $_SESSION['m_expire_date'] . '</td>';
        $_detail .= '</tr>' . "\n";
        $_detail .= '<tr>' . "\n";
        $_detail .= '<td class="key alterCell" width="15%"><strong>' . __('Institution') . '</strong></td>'
            . '<td class="value alterCell2" colspan="3">' . $_SESSION['m_institution'] . '</td>';
        $_detail .= '</tr>' . "\n";
        $_detail .= '</table>' . "\n";


        return $_detail;
    }


    /*
       * Function to show list of logged in member loan
       *
       * @param       int         number of loan records to show
       * @return      string
       */
    function showLoanList($num_recs_show = 20)
    {
        global $dbs;

        // table spec
        $_table_spec = 'loan AS l
            LEFT JOIN member AS m ON l.member_id=m.member_id
            LEFT JOIN item AS i ON l.item_code=i.item_code
            LEFT JOIN biblio AS b ON i.biblio_id=b.biblio_id';

        // create datagrid
        $_loan_list = new simbio_datagrid();
        $_loan_list->disable_paging = true;
        $_loan_list->table_ID = 'loanlist';
        $_loan_list->setSQLColumn('l.item_code AS \'' . __('Item Code') . '\'',
            'b.title AS \'' . __('Title') . '\'',
            'l.loan_date AS \'' . __('Loan Date') . '\'',
            'l.due_date AS \'' . __('Due Date') . '\'');
        $_loan_list->setSQLorder('l.loan_date DESC');
        $_criteria = sprintf('m.member_id=\'%s\' AND l.is_lent=1 AND is_return=0 ', $_SESSION['mid']);
        $_loan_list->setSQLCriteria($_criteria);

        // modify column value
        $_loan_list->modifyColumnContent(3, 'callback{showOverdue}');
        // set table and table header attributes
        $_loan_list->table_attr = 'align="center" class="memberLoanList table table-striped" cellpadding="5" cellspacing="0"';
        $_loan_list->table_header_attr = 'class="dataListHeader" style="font-weight: bold;"';
        $_loan_list->using_AJAX = false;
        // return the result
        $_result = $_loan_list->createDataGrid($dbs, $_table_spec, $num_recs_show);
        $_result = '<div class="memberLoanListInfo">' . $_loan_list->num_rows . ' ' . __('item(s) currently on loan') . ' | <a href="?p=download_current_loan">' . __('Download All Current Loan') . '</a></div>' . "\n" . $_result;
        return $_result;
    }

    /* callback function to show overdue */
    function showOverdue($obj_db, $array_data)
    {
        $_curr_date = date('Y-m-d');
        if (simbio_date::compareDates($array_data[3], $_curr_date) == $_curr_date) {
            return '<strong style="color: #f00;">' . $array_data[3] . ' ' . __('OVERDUED') . '</strong>';
        } else {
            return $array_data[3];
        }
    }

    /* Experimental Loan History - start */
    function showLoanHist($num_recs_show = 20)
    {
        global $dbs;

        // table spec
        $_table_spec = 'loan AS l
            LEFT JOIN member AS m ON l.member_id=m.member_id
            LEFT JOIN item AS i ON l.item_code=i.item_code
            LEFT JOIN biblio AS b ON i.biblio_id=b.biblio_id';

        // create datagrid
        $_loan_hist = new simbio_datagrid();
        $_loan_hist->disable_paging = true;
        $_loan_hist->table_ID = 'loanhist';
        $_loan_hist->setSQLColumn('l.item_code AS \'' . __('Item Code') . '\'',
            'b.title AS \'' . __('Title') . '\'',
            'l.loan_date AS \'' . __('Loan Date') . '\'',
            'l.return_date AS \'' . __('Return Date') . '\'');
        $_loan_hist->setSQLorder('l.loan_date DESC');
        $_criteria = sprintf('m.member_id=\'%s\' AND l.is_lent=1 AND is_return=1 ', $_SESSION['mid']);
        $_loan_hist->setSQLCriteria($_criteria);

        // modify column value
        #$_loan_hist->modifyColumnContent(3, 'callback{showOverdue}');
        // set table and table header attributes
        $_loan_hist->table_attr = 'align="center" class="memberLoanList table table-striped" cellpadding="5" cellspacing="0"';
        $_loan_hist->table_header_attr = 'class="dataListHeader" style="font-weight: bold;"';
        $_loan_hist->using_AJAX = false;
        // return the result
        $_result = $_loan_hist->createDataGrid($dbs, $_table_spec, $num_recs_show);
        $_result = '<div class="memberLoanHistInfo"> &nbsp;' . $_loan_hist->num_rows . ' ' . __('item(s) loan history') . ' | <a href="?p=download_loan_history">' . __('Download All Loan History') . '</a></div>' . "\n" . $_result;
        return $_result;
    }

    /*
       * Function to show member collection basket
       *
       * @param       int         number of loan records to show
       * @return      string
       */
    function showBasket($num_recs_show = 20)
    {
        global $dbs;

        // table spec
        $_table_spec = 'biblio AS b';

        // create datagrid
        $_loan_list = new simbio_datagrid();
        $_loan_list->table_ID = 'basket';
        $_loan_list->setSQLColumn('b.biblio_id AS \'' . __('Remove') . '\'', 'b.title AS \'' . __('Title') . '\'');
        $_loan_list->setSQLorder('b.last_update DESC');
        $_criteria = 'biblio_id = 0';
        if (count($_SESSION['m_mark_biblio']) > 0) {
            $_ids = '';
            foreach ($_SESSION['m_mark_biblio'] as $_biblio) {
                $_ids .= (integer)$_biblio . ',';
            }
            $_ids = substr_replace($_ids, '', -1);
            $_criteria = "b.biblio_id IN ($_ids)";
        }
        $_loan_list->setSQLCriteria($_criteria);
        $_loan_list->column_width[0] = '5%';
        $_loan_list->modifyColumnContent(1, 'callback{titleLink}');
        function titleLink($db, $data)
        {
            return '<a target="_blank" href="index.php?p=show_detail&id=' . $data[0] . '">' . $data[1] . '</a>';
        }
        $_loan_list->modifyColumnContent(0, '<input type="checkbox" name="basket[]" class="basketItem" value="{column_value}" />');

        // set table and table header attributes
        $_loan_list->table_attr = 'align="center" class="memberBasketList table table-striped" cellpadding="5" cellspacing="0"';
        $_loan_list->table_header_attr = 'class="dataListHeader" style="font-weight: bold;"';
        $_loan_list->using_AJAX = false;
        // return the result
        $_result = '<form name="memberBasketListForm" id="memberBasketListForm" action="index.php?p=member" method="post">' . "\n";
        $_datagrid = $_loan_list->createDataGrid($dbs, $_table_spec, $num_recs_show);
        $_actions = '<div class="memberBasketAction">';
        $_actions .= '<a href="index.php?p=member&sec=title_basket" class="btn btn-link basket reserve">' . __('Reserve title(s) on Basket') . '</a> ';
        $_actions .= '<a href="index.php?p=member&sec=title_basket" class="btn btn-link basket clearAll" postdata="clear_biblio=1">' . __('Clear Basket') . '</a> ';
        $_actions .= '<a href="index.php?p=member&sec=title_basket" class="btn btn-link basket clearOne">' . __('Remove selected title(s) from Basket') . '</a> ';
        $_actions .= '</div>';
        $_result .= '<div class="memberBasketInfo">' . $_loan_list->num_rows . ' ' . __('title(s) on basket') . $_actions . '</div>' . "\n" . $_datagrid;
        $_result .= "\n</form>";

        return $_result;
    }

    /*
       * Function to send reservation e-mail for titles in basket
       *
       * @return      array
       */
    function sendReserveMail()
    {
        global $dbs, $sysconf;

        if (count($_SESSION['m_mark_biblio']) > 0) {
            $_ids = '(';
            foreach ($_SESSION['m_mark_biblio'] as $_biblio) {
                $_ids .= (integer)$_biblio . ',';
            }
            $_ids = substr_replace($_ids, '', -1);
            $_ids .= ')';
        } else {
            return array('status' => 'ERROR', 'message' => 'No Titles to reserve');
        }

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                                                // Send using SMTP
            $mail->Host = $sysconf['mail']['server'];                                       // Set the SMTP server to send through
            $mail->SMTPAuth = $sysconf['mail']['auth_enable'];                              // Enable SMTP authentication
            $mail->Username = $sysconf['mail']['auth_username'];                            // SMTP username
            $mail->Password = $sysconf['mail']['auth_password'];                            // SMTP password
            if ($sysconf['mail']['SMTPSecure'] === 'tls') {                                 // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            } else if ($sysconf['mail']['SMTPSecure'] === 'ssl') {
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
            }
            $mail->Port = $sysconf['mail']['server_port'];                                  // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($sysconf['mail']['from'], $sysconf['mail']['from_name']);
            $mail->addReplyTo($sysconf['mail']['reply_to'], $sysconf['mail']['reply_to_name']);
            $mail->addAddress($sysconf['mail']['from'], $sysconf['mail']['from_name']);
            // additional recipient
            if (isset($sysconf['mail']['add_recipients'])) {
                foreach ($sysconf['mail']['add_recipients'] as $_recps) {
                    $mail->AddAddress($_recps['from'], $_recps['from_name']);
                }
            }
            $mail->addCC($_SESSION['m_email'], $_SESSION['m_name']);

            // Content
            // get message template
            $_msg_tpl = @file_get_contents(SB . 'template/reserve-mail-tpl.html');

            // date
            $_curr_date = date('Y-m-d H:i:s');

            // query
            $_biblio_q = $dbs->query("SELECT biblio_id, title FROM biblio WHERE biblio_id IN $_ids");

            // compile reservation data
            $_data = '<table width="100%" border="1">' . "\n";
            $_data .= '<tr><th>Titles to reserve</th></tr>' . "\n";
            while ($_title_d = $_biblio_q->fetch_assoc()) {
                $_data .= '<tr>';
                $_data .= '<td>' . $_title_d['title'] . '</td>' . "\n";
                $_data .= '</tr>';
            }
            $_data .= '</table>';

            // message
            $_message = str_ireplace(array('<!--MEMBER_ID-->', '<!--MEMBER_NAME-->', '<!--DATA-->', '<!--DATE-->'),
                array($_SESSION['mid'], $_SESSION['m_name'], $_data, $_curr_date), $_msg_tpl);

            // Set email format to HTML
            $mail->Subject = 'Reservation request from Member ' . $_SESSION['m_name'] . ' (' . $_SESSION['m_email'] . ')';
            $mail->msgHTML($_message);
            $mail->AltBody = strip_tags($_message);

            $mail->send();

            utility::writeLogs($dbs, 'member', isset($_SESSION['mid']) ? $_SESSION['mid'] : '0', 'membership', 'Reservation notification e-mail sent to ' . $_SESSION['m_email'], 'Reservation', 'Add');
            return array('status' => 'SENT', 'message' => 'Reservation notification e-mail sent to ' . $_SESSION['m_email']);
        } catch (Exception $exception) {
            utility::writeLogs($dbs, 'member', isset($_SESSION['mid']) ? $_SESSION['mid'] : '0', 'membership', 'FAILED to send reservation e-mail to ' . $_SESSION['m_email'] . ' (' . $mail->ErrorInfo . ')');
            return array('status' => 'ERROR', 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }

    function saveReserve($dbs, $sysconf)
    {

        if (count($_SESSION['m_mark_biblio']) > 0) {
            
            // cek dahulu, batas reservasi apakah sudah tercapai?
            if (($check = _isReserveAlowed($dbs)) !== true) return $check;

            $result = [];
            $sql_op = new simbio_dbop($dbs);
            $reserve['member_id'] = $_SESSION['mid'];

            foreach ($_SESSION['m_mark_biblio'] as $_index => $_biblio) {
                $id = (integer)$_biblio;
                $biblio = api::biblio_load($dbs, $id);

                // skip if already reseve this collection
                if(_isAlreadyReserved($dbs, $id)) {
                    $result[] = ['status' => 'SUCCESS', 'message' => sprintf(__('%s already reseved'), $biblio['title'])];
                    unset($_SESSION['m_mark_biblio'][$_index]);
                    continue;
                }

                // cek ketersediaan item,
                if(count($biblio['items'] ?? []) > 0) {
                    
                    if($sysconf['reserve_on_loan_only']) {
                        // ambil secara random dari koleksi yang dipinjam
                        $item_code = _getItemReserveFromLoan($dbs);
                    } else {
                        // Semua item bisa direservasi
                        $item_code = _getItemReserve($dbs, $id);
                    }

                    if(is_null($item_code)) {
                        $result[] = ['status' => 'ERROR', 'message' => sprintf(__('Item for %s is available for loan'), $biblio['title'])];
                    } else {
                        $reserve['biblio_id'] = $id;
                        $reserve['item_code'] = $item_code;
                        $reserve['reserve_date'] = date('Y-m-d H:i:s');
                        if($sql_op->insert('reserve', $reserve)) {
                            $result[] = ['status' => 'SUCCESS', 'message' => sprintf(__('%s reserved successfully'), $biblio['title'])];
                            unset($_SESSION['m_mark_biblio'][$_index]);
                        } else {
                            $debug_message = ENVIRONMENT == 'development' ? $sql_op->error : '';
                            $result[] = ['status' => 'ERROR', 'message' => sprintf(__('Reserve %s failed. '), $biblio['title']) . $debug_message ];
                        }
                    }

                } else {
                    // jika tidak memiliki item, maka tidak dapat direservasi.
                    $result[] = ['status' => 'ERROR', 'message' => sprintf(__('No item available to be reserved for %s'), $biblio['title'])];
                }
                
            }

            return $result;
        } else {
            return array('status' => 'ERROR', 'message' => __('No Titles to reserve'));
        }
    }

    function _isReserveAlowed($dbs) {

        // cek apakah di keanggotaan diijikan untuk reservasi
        if ($_SESSION['m_can_reserve'] == '0') return ['status' => 'ERROR', 'message' => __('Reservation not allowed')];;

        // hitung yang sedang direservasi
        $sql = "SELECT COUNT(reserve_id) FROM reserve WHERE member_id='%s'";
        $query = $dbs->query(sprintf($sql, $_SESSION['mid']));
        $data = $query->fetch_row();
        
        // hitung tinggal berapa kesempatan untuk reservasinya
        return ($data[0]+count($_SESSION['m_mark_biblio'])) > (int)$_SESSION['m_reserve_limit'] ? ['status' => 'ERROR', 'message' => __('Reserve limit reached')] : 
            (count($_SESSION['m_mark_biblio']) > (int)$_SESSION['m_reserve_limit'] ? ['status' => 'ERROR', 'message' => sprintf(__('Maximum reserve limit is %d collection'), (int)$_SESSION['m_reserve_limit'])] : true);
    }

    function _getItemReserve($dbs, $biblio_id)
    {
        $sql = "SELECT item_code FROM item WHERE biblio_id='%s' ORDER BY RAND() ASC LIMIT 1";
        $query = $dbs->query(sprintf($sql, $biblio_id));
        $data = $query->fetch_row();
        return $data[0] ?? null;
    }

    function _getItemReserveFromLoan($dbs)
    {
        $sql = "SELECT item_code, due_date FROM loan WHERE is_lent=1 AND is_return=0 ORDER BY RAND() ASC LIMIT 1";
        $query = $dbs->query($sql);
        $data = $query->fetch_row();
        return $data[0] ?? null;
    }

    function _isAlreadyReserved($dbs, $biblio_id)
    {
        $sql = "SELECT member_id FROM reserve WHERE biblio_id='%s' AND member_id='%s'";
        $query = $dbs->query(sprintf($sql, $biblio_id, $_SESSION['mid']));
        return $query->num_rows > 0;
    }
    // send reserve e-mail
    if (isset($_POST['sendReserve']) && $_POST['sendReserve'] == 1) {

        if ($sysconf['reserve_direct_database'] ?? false) {
            header('content-type: application/json');
            echo json_encode(saveReserve($dbs, $sysconf));
            exit;
        } else {
            $mail = sendReserveMail();
            if ($mail['status'] != 'ERROR') {
                $_SESSION['info']['data'] = __('Reservation e-mail sent successfully!');
                $_SESSION['info']['status'] = 'success';
            } else {
                $_SESSION['info']['data'] = '<span style="font-size: 120%; font-weight: bold; color: red;">'.__(sprintf('Reservation e-mail FAILED to sent with error: %s Please contact administrator!', $mail['message'])).'</span>';
                $_SESSION['info']['status'] = 'danger';
            }
            exit;
        }

    }

    ?>

    <div class="d-flex">
        <div style="width: 16rem;" class="bg-grey-light p-4" id="member_sidebar">
            <div class="p-4">
                <img src="./images/persons/<?php echo $member_image; ?>" alt="member photo" class="rounded shadow">
            </div>
            <a href="index.php?p=member&logout=1" class="btn btn-danger btn-block"><i
                        class="fas fa-sign-out-alt mr-2"></i><?php echo __('LOGOUT'); ?></a>
        </div>
        <div class="flex-grow-1 p-4" id="member_content">
            <div class="text-sm text-grey-dark">
                <?php
                if ($_SESSION['m_membership_pending']) :
                    $info = 'Your member status is pending state! Please contact system administrator for more detail.';
                    ?>
                    <i class="fas fa-lock mr-2 text-red"></i>Member status pending
                <?php
                elseif ($_SESSION['m_is_expired']) :
                    $info = 'Your member status is expired state! Please contact system administrator for more detail.';
                    ?>
                    <i class="far fa-calendar-times mr-2 text-red"></i>Member expired
                <?php else: ?>
                    <!--<i class="far fa-user mr-2 text-green"></i>--><?php echo $_SESSION['m_member_type']; ?>
                <?php endif; ?>
            </div>
            <h1 class="mb-2">Hi, <?php echo $_SESSION['m_name']; ?></h1>
            <p class="w-75 mb-4">
                <?php echo $info; ?>
            </p>
            <div class="row"></div>
            <div class="my-4">
                <ul class="nav nav-tabs nav-fill">
                    <?php
                    $tabs_menus = [
                        'current_loan' => [
                            'text' => __('Current Loan'),
                            'link' => 'index.php?p=member'
                        ],
                        'title_basket' => [
                            'text' => __('Title Basket'),
                            'link' => 'index.php?p=member&sec=title_basket'
                        ],
                        'loan_history' => [
                            'text' => __('Loan History'),
                            'link' => 'index.php?p=member&sec=loan_history'
                        ],
                        'my_account' => [
                            'text' => __('My Account'),
                            'link' => 'index.php?p=member&sec=my_account'
                        ]
                    ];
                    $section = isset($_GET['sec']) ? trim($_GET['sec']) : 'current_loan';
                    foreach ($tabs_menus as $km => $kv) {
                        $active = $section === $km ? 'active' : '';
                        $m = '<li class="nav-item">';
                        $m .= '<a class="nav-link ' . $active . '" href="' . $kv['link'] . '">' . $kv['text'] . '</a>';
                        $m .= '</li>';
                        echo $m;
                    }
                    ?>
                </ul>
                <div class="bg-white border-right border-bottom border-left p-4">
                    <?php
                    switch ($section) {
                        case 'current_loan':
                            echo '<div class="tagline">';
                            echo '<div class="memberInfoHead">' . __('My Current Loan') . '</div>' . "\n";
                            echo '</div>';
                            echo showLoanList();
                            break;
                        case 'title_basket':
                            echo '<div class="tagline">';
                            echo '<div class="memberInfoHead">' . __('My Title Basket') . '</div>' . "\n";
                            echo '</div>';
                            echo showBasket();
                            break;
                        case 'loan_history':
                            echo '<div class="tagline">';
                            echo '<div class="memberInfoHead">' . __('My Loan History') . '</div>' . "\n";
                            echo '</div>';
                            echo showLoanHist();
                            break;
                        case 'my_account':
                            echo '<div class="tagline">';
                            echo '<div class="memberInfoHead">' . __('Member Detail') . '</div>' . "\n";
                            echo '</div>';
                            echo showMemberDetail();
                            // change password only form NATIVE authentication, not for others such as LDAP
                            break;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
                $('.clearAll').click(function (evt) {
                    evt.preventDefault();
                    var anchor = $(this);
                    // get anchor href
                    var aHREF = anchor.attr('href');
                    var postData = anchor.attr('postdata');
                    if (confirm('Clear your title(s) basket?')) {
                        // send ajax
                        $.ajax({
                            type: 'POST',
                            url: aHREF, cache: false, data: postData, async: false,
                            success: function (ajaxRespond) {
                                alert('Basket data cleared!');
                                window.location.href = aHREF;
                            }
                        });
                    }
                });

                $('.clearOne').click(function (evt) {
                    evt.preventDefault();
                    var basketForm = $('#memberBasketListForm');
                    var basketData = basketForm.serialize() + '&basketRemove=1';
                    // get anchor href
                    var basketAction = basketForm.attr('action');
                    if (confirm('Remove selected title(s) from basket?')) {
                        // send ajax
                        $.ajax({
                            type: 'POST',
                            url: basketAction, cache: false, data: basketData, async: false,
                            success: function (ajaxRespond) {
                                alert('Selected basket data removed!');
                                window.location.href = 'index.php?p=member&sec=title_basket';
                            }
                        });
                    }
                });

                $('.reserve').click(function (evt) {
                    evt.preventDefault();
                    var anchor = $(this);
                    // get anchor href
                    var aHREF = anchor.attr('href');
                    // send ajax
                    $.ajax({
                        type: 'POST',
                        url: aHREF, cache: false, data: 'sendReserve=1', async: false,
                        success: function (ajaxRespond) {
                            console.log(ajaxRespond)

                            <?php if ($sysconf['reserve_direct_database'] ?? false): ?>

                                if(Array.isArray(ajaxRespond)) {

                                    for (let i = 0; i < ajaxRespond.length; i++) {
                                        const element = ajaxRespond[i];
                                        let message = element.message ?? 'Reservation request sent';
                                        if(element.status == 'ERROR') {
                                            toastr.error(message)
                                        } else {
                                            toastr.success(message)
                                        }
                                    }

                                } else {
                                    let message = ajaxRespond.message ?? 'Reservation request sent';
                                    if(ajaxRespond.status == 'ERROR') {
                                        toastr.error(message)
                                    } else {
                                        toastr.success(message)
                                    }
                                }

                            <?php else: ?>

                                alert('Reservation e-mail sent');
                                window.location.href = aHREF;
                                
                            <?php endif ?>
                        }
                    });
                });
            }
        );
    </script>
<?php else : ?>
    <h5 class="bg-primary text-white rounded" style="text-align:center;font-family: monospace;">Login menggunakan akun SSO</h5>
<section>

  <div class="container py-5">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-7 col-lg-5 col-xl-5">
        <form method="POST">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example13">Nim</label>
            <input id="userName" name="nim" type="text" class="form-control form-control-lg" placeholder="<?= __('Masukkan Nim'); ?>"/>
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form1Example23">Password</label>
            <input name="password" type="password" id="form1Example23" class="form-control form-control-lg" placeholder="<?= __('Masukkan Password'); ?>"/>
            
          </div>

          <!-- Submit button -->
          <button name="logMeIn" type="submit" class="btn btn-primary btn-block" >LOGIN</button>

        </form>
      </div>
    </div>
  </div>
</section>
    

<!-- <form method="POST">
    <div>
    <div class="col-auto offset-1 bi-person-circle" style="font-size: 100px"></div>
        <div class="loginInfo"><?php echo __('are you')?></div>
        <label>Nim</label> <br>
        <input id="userName" name="nim" type="text" placeholder="Masukkan nim">
    </div>
    <div>
        <label>Kata Sandi</label> <br>
        <input name="password" type="password" placeholder="Masukkan kata sandi">
    </div>
    <div>
    <input type="submit" name="logMeIn" value="login" class="memberButton"/>
    </div>
    </form> -->
    <script type="text/javascript">document.getElementById("userName").focus();;</script>
<?php endif; ?>