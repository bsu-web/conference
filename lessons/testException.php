<?php
	require_once("classes/Runner.php");
	//��������� ������ "�������� ����"
	echo "��������� ������: �� ���������� �����<br>";
	Runner::init("files/file.txt");
	echo "<br><hr>";
	//��������� ������ "����������� ����"
	echo "��������� ������: ����������� ����<br>";
	Runner::init("files/file1.txt");
	echo "<br><hr>";
	//��������� ������ "������������ ������ �����"
	echo "��������� ������: ������������ ������ �����<br>";
	Runner::init("files/file2.txt");
	echo "<br><hr>";
	//��������� ������ � ���������� ��������
	echo "�� ��������� ������ ���<br>";
	Runner::init("files/file3.txt");
	echo "<br><hr>";	
?>