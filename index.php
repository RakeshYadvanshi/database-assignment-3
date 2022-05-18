<?php
include "student-pdf-generator.php";
$pdf_generator = new StudentPdfGenerator();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['student_number'])) {
        $student_number = $_GET['student_number'];
        $pdf_generator->GenerateReport($student_number);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Student Report</h2>
    <form method="POST">
        <table>

            <tbody>
                <tr>
                    <td>Enter Student Number</td>
                    <td><input type="text" name="student_number"></td>
                </tr>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $student_number = $_POST['student_number'];
                    if ($pdf_generator->UserExists($student_number)) {
                ?>
                        <tr id="downloadRw">
                            <td colspan="2"><a onclick="document.querySelector('#downloadRw').remove()" href="index.php?student_number=<?php echo $student_number ?>">Download Report</a></td>
                        </tr>
                    <?php  } else { ?>
                        <tr>
                            <td colspan="2" style="color: orange;">Student does not exists in our system</td>
                        </tr>
                <?php }
                }
                ?>
                <tr>
                    <td colspan="2"><button type="submit">Generate Report</button></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>