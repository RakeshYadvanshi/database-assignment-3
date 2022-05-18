<?php
include "dbconnect.php";
include_once "pdf.php";

class StudentPdfGenerator
{
    private $conn;
    public function __construct()
    {
        $this->conn = (new Database())->GetConnectionObj();
        $this->pdf = new Pdf();
    }
    public  function UserExists($student_id)
    {
        $studentInfo = mysqli_query($this->conn, "SELECT id FROM students where id = '" . $student_id . "'") or die("database error:" . mysqli_error($this->conn));
        if ($studentInfo->num_rows > 0) {
            return true;
        }
        else 
        return false;
    }
    public  function GenerateReport($student_id)
    {
        $studentInfo = mysqli_query($this->conn, "SELECT * FROM students where id = '" . $student_id."'") or die("database error:" . mysqli_error($this->conn));

        $centerOfPage = $this->pdf->GetPageWidth() / 2;

        $this->pdf = new PDF();
        $this->pdf->SetMargins(20, 20, 20);
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 12);

        if ($studentInfo) {
            // Fetch one and one row
            while ($row = mysqli_fetch_row($studentInfo)) {
                $this->pdf->Cell($centerOfPage, 0, "Name of the student: " . $row[1], 0);
                $this->pdf->Cell(0, 0, "Date: " . date("Y-m-d"),);
                $this->pdf->Ln(8);
                $this->pdf->Cell(0, 0, "Student ID: " . $row[0], 0);
            }
        }
        $this->pdf->Ln(35);

        $studentGrades = mysqli_query($this->conn, "SELECT c.course_title,g.letter_grade FROM grades g, courses c where g.course_id = c.id and g.student_id = '" . $student_id . "'");
        if ($studentGrades) {
            // Fetch one and one row
            while ($row = mysqli_fetch_row($studentGrades)) {
                foreach ($row as $col)
                    $this->pdf->Cell($centerOfPage, 6, $col, 0);
                $this->pdf->Ln(12);
            }
        }
        $this->pdf->Output("", $student_id . "_report.pdf");
    }
}
