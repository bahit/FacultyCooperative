<?php

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('SkillTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('SkillOfferTableSeeder');
        $this->call('SkillWantedTableSeeder');
        $this->call('TeamTableSeeder');
        $this->call('VentureTableSeeder');
        $this->call('MessageTableSeeder');
    }

}

class SkillTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('skills')->truncate();

        Skill::create(array('category' => 'Engineering', 'skill_name' => 'Mechanics'));
        Skill::create(array('category' => 'Engineering', 'skill_name' => 'Optices'));
        Skill::create(array('category' => 'Engineering', 'skill_name' => 'Civil Engineering'));
        Skill::create(array('category' => 'Engineering', 'skill_name' => 'Materials'));
        Skill::create(array('category' => 'Engineering', 'skill_name' => 'Heat Thransfer'));
        Skill::create(array('category' => 'Engineering', 'skill_name' => 'Highway Engineering'));
        Skill::create(array('category' => 'Engineering', 'skill_name' => 'Structural Engineering'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Software Engineering'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Network'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Computational Vision'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Computer Architecture'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Robotics'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Cloud Computing'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Machine Learning'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'AI Systems'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'SQL'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'PHP'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'JAVA'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'ASP.NET'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'JSP.NET'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'C++'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'C#'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Python'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Perl'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Linux'));
        Skill::create(array('category' => 'Computer Science', 'skill_name' => 'Windows'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'Entrepreneurial'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'Communication'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'Commercial Awareness'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'Intellectual Property Law'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'Attention to Detail'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'Contract Law'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'Criminal Law'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'Equity & Trusts'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'Jurisprudence'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'European Union Law'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'International Court'));
        Skill::create(array('category' => 'Law', 'skill_name' => 'Employment Law'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Business Communication'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Finance'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Interpreting Data'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Negotiation'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Commercial Awareness'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Statistics'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Marketing'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Accounting'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Management'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Advertising'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Consumer Psychology'));
        Skill::create(array('category' => 'Economics', 'skill_name' => 'Global Supply Chains'));
        Skill::create(array('category' => 'Medical Sciences', 'skill_name' => 'Pharmacology'));
        Skill::create(array('category' => 'Medical Sciences', 'skill_name' => 'Endocrinology'));
        Skill::create(array('category' => 'Medical Sciences', 'skill_name' => 'Microbiology'));
        Skill::create(array('category' => 'Medical Sciences', 'skill_name' => 'Neurobiology'));
        Skill::create(array('category' => 'Medical Sciences', 'skill_name' => 'Physiology'));
        Skill::create(array('category' => 'Medical Sciences', 'skill_name' => 'Chemotherapy'));
        Skill::create(array('category' => 'Medical Sciences', 'skill_name' => 'Toxicology'));
        Skill::create(array('category' => 'Marketing', 'skill_name' => 'Advertising'));
        Skill::create(array('category' => 'Marketing', 'skill_name' => 'Priduct Launches'));
        Skill::create(array('category' => 'Marketing', 'skill_name' => 'International Business'));
        Skill::create(array('category' => 'Business Skills', 'skill_name' => 'Entrepreneurial'));
        Skill::create(array('category' => 'Business Skills', 'skill_name' => 'Administration'));
        Skill::create(array('category' => 'Business Skills', 'skill_name' => 'Finance'));
        Skill::create(array('category' => 'Philosophy', 'skill_name' => 'Greek Philosophy'));
        Skill::create(array('category' => 'Philosophy', 'skill_name' => 'Ethics'));
        Skill::create(array('category' => 'Education', 'skill_name' => 'Communication'));
        Skill::create(array('category' => 'Education', 'skill_name' => 'History'));
        Skill::create(array('category' => 'Education', 'skill_name' => 'Pre-school'));
        Skill::create(array('category' => 'Education', 'skill_name' => 'Middle-school'));
        Skill::create(array('category' => 'Education', 'skill_name' => 'High-school'));
        Skill::create(array('category' => 'Education', 'skill_name' => 'University'));
        Skill::create(array('category' => 'Literature', 'skill_name' => 'Creative Writing'));
        Skill::create(array('category' => 'Literature', 'skill_name' => 'Essay Writing'));
        Skill::create(array('category' => 'Literature', 'skill_name' => 'American Literature'));
        Skill::create(array('category' => 'Literature', 'skill_name' => 'British Literature'));
        Skill::create(array('category' => 'Literature', 'skill_name' => 'Fiction'));
        Skill::create(array('category' => 'Literature', 'skill_name' => 'Novels'));
        Skill::create(array('category' => 'Literature', 'skill_name' => 'Poetry'));
        Skill::create(array('category' => 'History', 'skill_name' => 'British History'));
        Skill::create(array('category' => 'History', 'skill_name' => 'European History'));
        Skill::create(array('category' => 'History', 'skill_name' => 'Wars'));
        Skill::create(array('category' => 'Mathematics', 'skill_name' => 'Calculus'));
        Skill::create(array('category' => 'Mathematics', 'skill_name' => 'Algebra'));
        Skill::create(array('category' => 'Mathematics', 'skill_name' => 'Statistics'));
        Skill::create(array('category' => 'Mathematics', 'skill_name' => 'Geometry'));
        Skill::create(array('category' => 'Mathematics', 'skill_name' => 'Probability'));
        Skill::create(array('category' => 'Mathematics', 'skill_name' => 'Equations'));
        Skill::create(array('category' => 'Mathematics', 'skill_name' => 'Fractals'));
        Skill::create(array('category' => 'Mathematics', 'skill_name' => 'Combinatorics'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Relativity'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Optics'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Mechanics'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Electricity'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Magnetism'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Crystal Physics'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Spectroscopy'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Nuclear'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Electrodynamics'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Thermodynamics'));
        Skill::create(array('category' => 'Physics', 'skill_name' => 'Laser'));
        Skill::create(array('category' => 'Chemistry', 'skill_name' => 'Spectroscopy'));
        Skill::create(array('category' => 'Chemistry', 'skill_name' => 'Synthesis'));
        Skill::create(array('category' => 'Chemistry', 'skill_name' => 'Kinetics'));
        Skill::create(array('category' => 'Chemistry', 'skill_name' => 'Thermodynamics'));
        Skill::create(array('category' => 'Chemistry', 'skill_name' => 'Analytical Chemistry'));
        Skill::create(array('category' => 'Chemistry', 'skill_name' => 'Optial Spectroscopy'));
        Skill::create(array('category' => 'Chemistry', 'skill_name' => 'Quantum Mechanics'));
        Skill::create(array('category' => 'Chemistry', 'skill_name' => 'X-ray Diffraction'));
        Skill::create(array('category' => 'Chemistry', 'skill_name' => 'Photochemistry'));
        Skill::create(array('category' => 'Astronomy', 'skill_name' => 'Galaxies'));
        Skill::create(array('category' => 'Astronomy', 'skill_name' => 'The Solar System'));
        Skill::create(array('category' => 'Astronomy', 'skill_name' => 'Light & Optics'));
        Skill::create(array('category' => 'Astronomy', 'skill_name' => 'Heat & Magnetism'));
        Skill::create(array('category' => 'Astronomy', 'skill_name' => 'Astronomical Techniques'));
        Skill::create(array('category' => 'Astronomy', 'skill_name' => 'Dark Matter'));
        Skill::create(array('category' => 'Astronomy', 'skill_name' => 'Particle Physics'));
        Skill::create(array('category' => 'Geography', 'skill_name' => 'Geomorphology'));
        Skill::create(array('category' => 'Geography', 'skill_name' => 'Hydroclimatology'));
        Skill::create(array('category' => 'Geography', 'skill_name' => 'Urban Geography'));
        Skill::create(array('category' => 'Geography', 'skill_name' => 'Geodemographics'));
        Skill::create(array('category' => 'Geography', 'skill_name' => 'Migration'));
        Skill::create(array('category' => 'Biology', 'skill_name' => 'Animal Behaviour'));
        Skill::create(array('category' => 'Biology', 'skill_name' => 'Bioenergetics'));
        Skill::create(array('category' => 'Biology', 'skill_name' => 'Bioinformatics'));
        Skill::create(array('category' => 'Biology', 'skill_name' => 'Extinct Animals'));
        Skill::create(array('category' => 'Biology', 'skill_name' => 'Cell Structure'));
        Skill::create(array('category' => 'Biology', 'skill_name' => 'Evolution'));
        Skill::create(array('category' => 'Biology', 'skill_name' => 'Infection & Disease'));
        Skill::create(array('category' => 'Biology', 'skill_name' => 'Neuroscience'));
        Skill::create(array('category' => 'Biology', 'skill_name' => 'Pharmacology'));
        Skill::create(array('category' => 'Biology', 'skill_name' => 'Zoology'));
        Skill::create(array('category' => 'Agriculture', 'skill_name' => 'Agri-business Economics'));
        Skill::create(array('category' => 'Agriculture', 'skill_name' => 'Economics'));
        Skill::create(array('category' => 'Agriculture', 'skill_name' => 'Environment and Land Resources'));
        Skill::create(array('category' => 'Agriculture', 'skill_name' => 'Genetics'));
        Skill::create(array('category' => 'Agriculture', 'skill_name' => 'Animal Health'));
        Skill::create(array('category' => 'Agriculture', 'skill_name' => 'Plant Biology'));
        Skill::create(array('category' => 'Agriculture', 'skill_name' => 'Animal Breeding'));
        Skill::create(array('category' => 'Agriculture', 'skill_name' => 'Agronomy'));
        Skill::create(array('category' => 'Agriculture', 'skill_name' => 'Agricultural Markets'));
        Skill::create(array('category' => 'Architecture', 'skill_name' => 'Urban Design'));
        Skill::create(array('category' => 'Architecture', 'skill_name' => 'Interior Design'));
        Skill::create(array('category' => 'Architecture', 'skill_name' => 'Garden Design'));
        Skill::create(array('category' => 'Music', 'skill_name' => 'Aural Skills'));
        Skill::create(array('category' => 'Music', 'skill_name' => 'Sound Design'));
        Skill::create(array('category' => 'Music', 'skill_name' => 'Guitar'));
        Skill::create(array('category' => 'Music', 'skill_name' => 'Violin'));
        Skill::create(array('category' => 'Music', 'skill_name' => 'Cello'));
        Skill::create(array('category' => 'Music', 'skill_name' => 'Drums'));
        Skill::create(array('category' => 'Music', 'skill_name' => 'Bass'));
        Skill::create(array('category' => 'Music', 'skill_name' => 'Piano'));
        Skill::create(array('category' => 'Music', 'skill_name' => 'Trumpet'));
        Skill::create(array('category' => 'Dance', 'skill_name' => 'Choreography'));
        Skill::create(array('category' => 'Dance', 'skill_name' => 'Improvisation'));
        Skill::create(array('category' => 'Dance', 'skill_name' => 'Ballet'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Oil Painting'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Watercolours'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Pencil Drawing'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Carbon Drawing'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Digital Drawing'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Graphic Design'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Renaissance'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Modern Art'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Contemporary Art'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Sculpting'));
        Skill::create(array('category' => 'Fine Arts', 'skill_name' => 'Photography'));


    }

}


class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();

        User::create(array(
            'email' => 'sthomag@essex.ac.uk',
            'password' => '$2y$10$Y1OpejW903JRADxyqQy/jeqI59jlG/FMtQNdyMS.ZxrStO7R/8WyK',
            'name' => 'Sarah Thomas',
            'image' => 'profile1.jpg',
            'bio_details' => 'I am skilled at making tea',
            'career_status' => 'Postgraduate',
            'institution' => 'Essex University',
            'investment_offered' => '0'
        ));


        User::create(array(
            'email' => 'xchenad@essex.ac.uk',
            'password' => '$2y$10$Y1OpejW903JRADxyqQy/jeqI59jlG/FMtQNdyMS.ZxrStO7R/8WyK',
            'name' => 'Chen Xiaofeng',
            'image' => 'profile2.jpg',
            'bio_details' => 'Work hard, Play hard!',
            'career_status' => 'Postgraduate',
            'institution' => 'Essex University',
            'investment_offered' => '0'
        ));


        User::create(array(
            'email' => 'iheras@essex.ac.uk',
            'password' => '$2y$10$Y1OpejW903JRADxyqQy/jeqI59jlG/FMtQNdyMS.ZxrStO7R/8WyK',
            'name' => 'Irina Herascu',
            'image' => 'profile3.jpg',
            'bio_details' => 'I am from Romania, and I am good at Photoshop',
            'career_status' => 'Postgraduate',
            'institution' => 'Essex University',
            'investment_offered' => '0'
        ));


        User::create(array(
            'email' => 'bhamid@essex.ac.uk',
            'password' => '$2y$10$Y1OpejW903JRADxyqQy/jeqI59jlG/FMtQNdyMS.ZxrStO7R/8WyK',
            'name' => 'Bahit Hamit',
            'image' => 'profile4.png',
            'bio_details' => 'Hi, everyone. My name is Bahit, I am from Brunei, and I am good at programming in PHP',
            'career_status' => 'Postgraduate',
            'institution' => 'Essex University',
            'investment_offered' => '0'
        ));


        User::create(array(
            'email' => 'eaoals@essex.ac.uk',
            'password' => '$2y$10$Y1OpejW903JRADxyqQy/jeqI59jlG/FMtQNdyMS.ZxrStO7R/8WyK',
            'name' => 'Alshuaibi Enaam A O',
            'bio_details' => 'Hi, everyone. My name is Enaam, I like smiling',
            'career_status' => 'Postgraduate',
            'institution' => 'Essex University',
            'investment_offered' => '0'
        ));


        User::create(array(
            'email' => 'kperry@hotmail.com',
            'password' => '$2y$10$Y1OpejW903JRADxyqQy/jeqI59jlG/FMtQNdyMS.ZxrStO7R/8WyK',
            'name' => 'Katy Perry',
            'image' => 'katyperry.jpg',
            'bio_details' => 'I am Katy Perry, I am a singer!Welcome to my personal website:www.katyperry.com',
            'career_status' => 'Business Professional',
            'institution' => 'None',
            'investment_offered' => '1'
        ));


        User::create(array(
            'email' => 'bgates@hotmail.com',
            'password' => '$2y$10$Y1OpejW903JRADxyqQy/jeqI59jlG/FMtQNdyMS.ZxrStO7R/8WyK',
            'name' => 'Bill Gates',
            'image' => 'billgates.jpg',
            'bio_details' => 'Hello every, I am Bill,I am the richest man in the world!',
            'career_status' => 'Business Professional',
            'institution' => 'Harvard University',
            'investment_offered' => '1'
        ));


        User::create(array(
            'email' => 'bob@essex.ac.uk',
            'password' => '$2y$10$Y1OpejW903JRADxyqQy/jeqI59jlG/FMtQNdyMS.ZxrStO7R/8WyK',
            'name' => 'Dr Bob Oldman',
            'image' => 'profile8.jpg',
            'bio_details' => 'I am a historian. What did the Pharaoh say when he saw the pyramid? Mummy’s home.',
            'career_status' => 'Academic',
            'institution' => 'Essex University',
            'investment_offered' => '0'
        ));


        User::create(array(
            'email' => 'jim@shister.ac.uk',
            'password' => '$2y$10$Y1OpejW903JRADxyqQy/jeqI59jlG/FMtQNdyMS.ZxrStO7R/8WyK',
            'name' => 'Jim Lawman',
            'bio_details' => 'I want to help students with legal work in return for equity',
            'career_status' => 'Business Professional',
            'institution' => 'Shister and Shister Law Firm',
            'image' => 'profile9.jpg',
            'investment_offered' => '1'
        ));

    }

}

class SkillOfferTableSeeder extends Seeder
{
//This is the skills that users can offer
    public function run()
    {
        DB::table('skill_offers')->truncate();


        SkillOffer::create(array('user_id' => '1', 'skill_id' => ' 16'));
        SkillOffer::create(array('user_id' => '1', 'skill_id' => ' 17'));
        SkillOffer::create(array('user_id' => '1', 'skill_id' => ' 18'));
        SkillOffer::create(array('user_id' => '1', 'skill_id' => ' 127'));
        SkillOffer::create(array('user_id' => '1', 'skill_id' => ' 166'));
        SkillOffer::create(array('user_id' => '2', 'skill_id' => ' 9'));
        SkillOffer::create(array('user_id' => '2', 'skill_id' => ' 12'));
        SkillOffer::create(array('user_id' => '2', 'skill_id' => ' 13'));
        SkillOffer::create(array('user_id' => '2', 'skill_id' => ' 22'));
        SkillOffer::create(array('user_id' => '2', 'skill_id' => ' 61'));
        SkillOffer::create(array('user_id' => '3', 'skill_id' => ' 8'));
        SkillOffer::create(array('user_id' => '3', 'skill_id' => ' 13'));
        SkillOffer::create(array('user_id' => '3', 'skill_id' => ' 17'));
        SkillOffer::create(array('user_id' => '3', 'skill_id' => ' 25'));
        SkillOffer::create(array('user_id' => '3', 'skill_id' => ' 26'));
        SkillOffer::create(array('user_id' => '3', 'skill_id' => ' 166'));
        SkillOffer::create(array('user_id' => '4', 'skill_id' => ' 11'));
        SkillOffer::create(array('user_id' => '4', 'skill_id' => ' 13'));
        SkillOffer::create(array('user_id' => '4', 'skill_id' => ' 16'));
        SkillOffer::create(array('user_id' => '4', 'skill_id' => ' 17'));
        SkillOffer::create(array('user_id' => '4', 'skill_id' => ' 19'));
        SkillOffer::create(array('user_id' => '4', 'skill_id' => ' 22'));
        SkillOffer::create(array('user_id' => '4', 'skill_id' => ' 23'));
        SkillOffer::create(array('user_id' => '4', 'skill_id' => ' 58'));
        SkillOffer::create(array('user_id' => '4', 'skill_id' => ' 152'));
        SkillOffer::create(array('user_id' => '4', 'skill_id' => ' 155'));
        SkillOffer::create(array('user_id' => '5', 'skill_id' => ' 13'));
        SkillOffer::create(array('user_id' => '5', 'skill_id' => ' 17'));
        SkillOffer::create(array('user_id' => '5', 'skill_id' => ' 18'));
        SkillOffer::create(array('user_id' => '5', 'skill_id' => ' 22'));
        SkillOffer::create(array('user_id' => '5', 'skill_id' => ' 24'));
        SkillOffer::create(array('user_id' => '5', 'skill_id' => ' 25'));
        SkillOffer::create(array('user_id' => '5', 'skill_id' => ' 26'));
        SkillOffer::create(array('user_id' => '5', 'skill_id' => ' 42'));
        SkillOffer::create(array('user_id' => '5', 'skill_id' => ' 43'));
        SkillOffer::create(array('user_id' => '5', 'skill_id' => ' 44'));
        SkillOffer::create(array('user_id' => '6', 'skill_id' => ' 144'));
        SkillOffer::create(array('user_id' => '6', 'skill_id' => ' 153'));
        SkillOffer::create(array('user_id' => '6', 'skill_id' => ' 154'));
        SkillOffer::create(array('user_id' => '6', 'skill_id' => ' 155'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 39'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 40'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 41'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 42'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 43'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 44'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 45'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 46'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 47'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 48'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 49'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 50'));
        SkillOffer::create(array('user_id' => '7', 'skill_id' => ' 61'));
        SkillOffer::create(array('user_id' => '8', 'skill_id' => ' 79'));
        SkillOffer::create(array('user_id' => '8', 'skill_id' => ' 80'));
        SkillOffer::create(array('user_id' => '8', 'skill_id' => ' 81'));
        SkillOffer::create(array('user_id' => '9', 'skill_id' => ' 29'));
        SkillOffer::create(array('user_id' => '9', 'skill_id' => ' 30'));
        SkillOffer::create(array('user_id' => '9', 'skill_id' => ' 31'));
        SkillOffer::create(array('user_id' => '9', 'skill_id' => ' 32'));
        SkillOffer::create(array('user_id' => '9', 'skill_id' => ' 36'));
        SkillOffer::create(array('user_id' => '9', 'skill_id' => ' 37'));
        SkillOffer::create(array('user_id' => '9', 'skill_id' => ' 38'));


    }

}

class SkillWantedTableSeeder extends Seeder
{
//This is the skills that ventures are looking for
    public function run()
    {
        DB::table('skill_wanteds')->truncate();

        SkillWanted::create(array('venture_id' => '1', 'skill_id' => '18'));
        SkillWanted::create(array('venture_id' => '1', 'skill_id' => '23'));
        SkillWanted::create(array('venture_id' => '1', 'skill_id' => '26'));
        SkillWanted::create(array('venture_id' => '1', 'skill_id' => '153'));
        SkillWanted::create(array('venture_id' => '1', 'skill_id' => '154'));
        SkillWanted::create(array('venture_id' => '1', 'skill_id' => '155'));
        SkillWanted::create(array('venture_id' => '2', 'skill_id' => '1'));
        SkillWanted::create(array('venture_id' => '2', 'skill_id' => '12'));
        SkillWanted::create(array('venture_id' => '2', 'skill_id' => '30'));
        SkillWanted::create(array('venture_id' => '2', 'skill_id' => '122'));
        SkillWanted::create(array('venture_id' => '3', 'skill_id' => '8'));
        SkillWanted::create(array('venture_id' => '3', 'skill_id' => '14'));
        SkillWanted::create(array('venture_id' => '3', 'skill_id' => '26'));
        SkillWanted::create(array('venture_id' => '3', 'skill_id' => '42'));
        SkillWanted::create(array('venture_id' => '3', 'skill_id' => '47'));
        SkillWanted::create(array('venture_id' => '3', 'skill_id' => '48'));
        SkillWanted::create(array('venture_id' => '6', 'skill_id' => '8'));
        SkillWanted::create(array('venture_id' => '6', 'skill_id' => '17'));
        SkillWanted::create(array('venture_id' => '6', 'skill_id' => '40'));
        SkillWanted::create(array('venture_id' => '6', 'skill_id' => '48'));
        SkillWanted::create(array('venture_id' => '6', 'skill_id' => '49'));
        SkillWanted::create(array('venture_id' => '6', 'skill_id' => '166'));

    }

}

class TeamTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('teams')->truncate();

        Team::create(array('venture_id' => '1', 'user_id' => '1', 'position' => '2'));
        Team::create(array('venture_id' => '1', 'user_id' => '7', 'position' => '1'));
        Team::create(array('venture_id' => '1', 'user_id' => '6'));
        Team::create(array('venture_id' => '1', 'user_id' => '2'));

        Team::create(array('venture_id' => '2', 'user_id' => '3', 'position' => '2'));
        Team::create(array('venture_id' => '2', 'user_id' => '8', 'position' => '1'));
        Team::create(array('venture_id' => '2', 'user_id' => '2'));
        Team::create(array('venture_id' => '2', 'user_id' => '4'));

        Team::create(array('venture_id' => '6', 'user_id' => '3', 'position' => '2'));
        Team::create(array('venture_id' => '6', 'user_id' => '8', 'position' => '1'));
        Team::create(array('venture_id' => '6', 'user_id' => '1'));


        Team::create(array('venture_id' => '3', 'user_id' => '5', 'position' => '2'));
        Team::create(array('venture_id' => '3', 'user_id' => '6'));
        Team::create(array('venture_id' => '3', 'user_id' => '7'));



    }

}

class VentureTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('ventures')->truncate();

        Venture::create(array(
            'title' => 'The IT Dance Company',
            'logo' => 'logo1.jpg',
            'description' => 'A funky fusion of PHP and dance. We are going to be so rich',
            'funding_target' => '300',
            'funding_secured' => '100'
        ));


        Venture::create(array(
            'title' => 'The Robot Fish',
            'logo' => 'fish.jpg',
            'description' => 'A robot fish designed to scare all the other fish in the pond',
            'funding_target' => '800',
            'funding_secured' => '100'
        ));


        Venture::create(array(
            'title' => 'Boogle',
            'logo' => 'boogle.png',
            'description' => 'Do not be evil',
            'funding_target' => '999999999',
            'funding_secured' => '1000000'
        ));


        Venture::create(array(
            'title' => 'Sliced Apple',
            'logo' => 'logo4.jpg',
            'description' => 'Change the world',
            'funding_target' => '999999999',
            'funding_secured' => '1000000'
        ));


        Venture::create(array(
            'title' => 'Microshift',
            'logo' => 'tp.jpg',
            'description' => 'Be what is next',
            'funding_target' => '999999999',
            'funding_secured' => '1000000'
        ));


        Venture::create(array(
            'title' => 'Facebucket',
            'logo' => 'facebucket.jpg',
            'description' => 'Facebook is a social utility that connects you with the people around you',
            'funding_target' => '999999999',
            'funding_secured' => '1000000'
        ));


        Venture::create(array(
            'title' => 'Tenpercent',
            'logo' => 'logo8.png',
            'description' => 'To be the most respected internet company',
            'funding_target' => '99999999',
            'funding_secured' => '100000'
        ));


        Venture::create(array(
            'title' => 'Swallows and Amazon',
            'logo' => 'logo9.jpg',
            'description' => '…and You are Done',
            'funding_target' => '999999999',
            'funding_secured' => '1000000'
        ));


    }


}

class MessageTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('messages')->truncate();

        Message::create(array(
            'subject' => 'Hello Sarah',
            'from_user_id' => '2',
            'to_user_id' => '1',
            'body' => "Let's meet up for tea and cake",

        ));

        Message::create(array(
            'subject' => 'Can you help us',
            'from_user_id' => '3',
            'to_user_id' => '1',
            'body' => "We need someone to do some stuff for us",
        ));

        Message::create(array(
            'subject' => 'We need a designer',
            'from_user_id' => '4',
            'to_user_id' => '1',
            'body' => "Can you design something for us - if so please reply",
        ));


    }


}