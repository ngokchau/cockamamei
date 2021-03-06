<?php include 'views/partials/header.php'; ?>

<style>
table{
    width: 100%;
}
td {
    width: 20%;
}
</style>

<div class="container">
    <div class="row" >
        <div class="col-xs-10">
            <p>
                Welcome, <?php echo $firstname . ' ' . $lastname; ?>
            </p>
        </div>
        <div class="col-xs-1">
            <p>
                <a href="#" class="right">Pricing</a>
            </p>
        </div>
        <div class="col-xs-1">
            <p>
                <a href="logout" class="right">Logout</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <h1>Meetings</h1>
            <ul>
                <li>Meeting with Cockamamei</li>
                <li>Finalize design</li>
                <li>Ideation for Krypt</li>
            </ul>
        </div>
        <div class="col-xs-9">
            <h1>Week View/<span style="color: #cccccc; font-size: 14pt;">Meeting with Cockamamei</span></h1>
            <table>
                <tr>
                    <td>
                        <h4>Sun, Nov. 16, 2014</h4>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Keegan</td>
                    <td>Bryant</td>
                    <td>Hamzah</td>
                    <td>Chau</td>
                </tr>
                <tr>
                    <td>06:00:00 AM</td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                </tr>
                <tr>
                    <td>07:00:00 AM</td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                </tr>
                <tr>
                    <td>08:00:00 AM</td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                </tr>
                <tr>
                    <td>09:00:00 AM</td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #68e23f;"></td>
                </tr>
                <tr>
                    <td>10:00:00 AM</td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                </tr>
                <tr id="perfectWeek">
                    <td style="border: 2px solid gold;">11:00:00 AM</td>
                    <td style="border: 2px solid gold; background: #68e23f;"></td>
                    <td style="border: 2px solid gold; background: #68e23f;"></td>
                    <td style="border: 2px solid gold; background: #68e23f;"></td>
                    <td style="border: 2px solid gold; background: #68e23f;"></td>
                </tr>
                <tr>
                    <td>12:00:00 PM</td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                </tr>
                <tr>
                    <td>01:00:00 PM</td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                </tr>
                <tr>
                    <td>02:00:00 PM</td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                </tr>
                <tr>
                    <td>03:00:00 PM</td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                </tr>
                <tr>
                    <td>04:00:00 PM</td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                </tr>
                <tr>
                    <td>05:00:00 PM</td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #68e23f;"></td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #ff4646;"></td>
                </tr>
                <tr>
                    <td>06:00:00 PM</td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #ff4646;"></td>
                    <td style="background: #ff4646;"></td>
                </tr>
            </table>
            <?php
            for($i = 0; $i < 6; $i++)
            {
            ?>
                <?php
                $now = new DateTime('now');
                $now->modify('+' . $i . ' day');
                ?>
                <table>
                    <tr>
                        <td>
                            <h4><?php echo $now->format('D, M. d, Y'); ?></h4>
                        </td>
                    </tr>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
