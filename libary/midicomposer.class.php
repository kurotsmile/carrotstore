<?php
/*
MidiComposer 1.0

@Date...: 31/03/10
@Author.: luruke
@Notes..:
http://www.halil.co.il/en/ENSong_JingleBells.asp
http://www.sciencebuddies.org/mentoring/project_ideas/Phys_img024.jpg
7F = G9
7E = Gb9
7D = F9
7C = E9
7B = Eb9
7A = D9
79 = Db9
78 = C9
77 = B8
76 = Bb8
75 = A8
74 = Ab8
73 = G8
72 = Gb8
71 = F8
70 = E8
6F = Eb8
6E = D8
6D = Db8
6C = C8
6B = B7
6A = Bb7
69 = A7
68 = Ab7
67 = G7
66 = Gb7
65 = F7
64 = E7
63 = Eb7
62 = D7
61 = Db7
60 = C7
5F = B6
5E = Bb6
5D = A6
5C = Ab6
5B = G6
5A = Gb6
59 = F6
58 = E6
57 = Eb6
56 = D6
55 = Db6
54 = C6
53 = B5
52 = Bb5
51 = A5
50 = Ab5
4F = G5
4E = Gb5
4D = F5
4C = E5
4B = Eb5
4A = D5
49 = Db5
48 = C5
47 = B4
46 = Bb4
45 = A4
44 = Ab4
43 = G4
42 = Gb4
41 = F4
40 = E4
3F = Eb4
3E = D4
3D = Db4
3C = C4
3B = B3
3A = Bb3
39 = A3
38 = Ab3
37 = G3
36 = Gb3
35 = F3
34 = E3
33 = Eb3
32 = D3
31 = Db3
30 = C3
2F = B2
2E = Bb2
2D = A2
2C = Ab2
2B = G2
2A = Gb2
29 = F2
28 = E2
27 = Eb2
26 = D2
25 = Db2
24 = C2
23 = B1
22 = Bb1
21 = A1
20 = Ab1
1F = G1
1E = Gb1
1D = F1
1C = E1
1B = Eb1
1A = D1
19 = Db1
18 = C1
17 = B0
16 = Bb0
15 = A0
14 = Ab0
13 = G0
12 = Gb0
11 = F0
10 = E0
0F = Eb0
0E = D0
0D = Db0
0C = C0
0B = B(-1)
0A = Bb(-1)
09 = A(-1)
08 = Ab(-1)
07 = G(-1)
06 = Gb(-1)
05 = F(-1)
04 = E(-1)
03 = Eb(-1)
02 = D(-1)
01 = Db(-1)
00 = C(-1
*/


class MIDIcomposer
{
	
	function __construct()
	{

		$this->HEADER = array
						(
							"A"	=>	$this->hex("4D 54 68 64"),
							"B" =>	$this->hex("00 00 00 06"),
							"C" =>	$this->hex("00 01"),
							"D" =>	$this->hex("00 01"),
							"E" =>	$this->hex("00 D0"),
							"F" =>	$this->hex("4D 54 72 6B"),
							"G" =>	$this->hex("00 00 00 00")
						);
		
		$this->TRACK = $this->hex("80 00 90 3C 60");

	}
	
	/*
		Note: View in the comment.
		Tempo: 1-3
		Volume: 0-127
	*/
	public function addnote($note = "3C", $tempo = 2, $volume = 60)
	{
		if($tempo > 3 or $tempo < 1) die("Tempo invalid (1-3)\n");
		$tempo_type = array ( 1 => 1, 2 => 50, 3 => 79);
		
		if($volume > 127 or $volume < 0) die("Volume invalid (0-127)\n");
		$volume = str_pad(dechex($volume), 2, "0", STR_PAD_LEFT);
		
		if(hexdec($note) > 127 or hexdec($note) < 0) die("Invalid Note\n");
		
		$this->TRACK .= $this->hex("81 $tempo_type[$tempo] $note $volume");
	}
	
	public function save($file)
	{
		$handle = fopen($file, "w+") or die("Error to save the file.\n");
		
		$this->HEADER["G"] = $this->hex(join(" ", str_split(str_pad(strtoupper(dechex(strlen($this->TRACK)+4)), 8, "0", STR_PAD_LEFT), 2)));

		fwrite($handle, join($this->HEADER).$this->TRACK.$this->hex("00 FF 2F 00"));
	}

	
	private function hex($hexcode)
	{
		$tmp='';
		foreach(explode(" ", $hexcode) as $hex)
        {
            $tmp .= pack('C*', hexdec($hex));
        }
        
        return $tmp;
	}
	


}

?>