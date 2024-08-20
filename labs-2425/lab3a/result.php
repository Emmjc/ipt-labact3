<?php

require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
}

$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
$agree = $_POST['agree'];
$answers = $_POST['answers'] ?? [];

// Compute the score
$score = compute_score($answers);

// Determine the class to use based on the score
$hero_class = ($score > 2) ? 'hero is-success' : 'hero is-danger';

// Determine whether to display the confetti canvas
$show_confetti = ($score == 5);

// Format the birthdate
$date = new DateTime($birthdate);
$formatted_birthdate = $date->format('F j, Y'); 


// Retrieve questions and correct answers
$questions = retrieve_questions();
$correct_answers = $questions['answers'];

?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/site/site.min.css">
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
</head>
<body>
<section class="<?php echo $hero_class; ?>">
    <div class="hero-body">
        <p class="title">Your Score: <?php echo $score; ?></p>
        <p class="subtitle">This is the IPT10 PHP Quiz Web Application Laboratory Activity.</p>
    </div>
</section>
<section class="section">
    <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <tbody>
                <tr>
                    <th>Input Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Complete Name</td>
                    <td><?php echo $complete_name; ?></td>
                </tr>
                <tr class="is-selected">
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Birthdate</td>
                    <td><?php echo $formatted_birthdate; ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php echo $contact_number; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
     <!-- Table showing all questions, correct answers, and user answers -->
     <div class="table-container">
        <table class="table is-bordered is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Correct Answer</th>
                    <th>Your Answer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions['questions'] as $index => $question): ?>
                <tr>
                    <td><?php echo $question['question']; ?></td>
                    <td>
                        <?php
                        $correct_option = $correct_answers[$index];
                        $correct_answer = array_filter($question['options'], function($option) use ($correct_option) {
                            return $option['key'] === $correct_option;
                        });
                        echo !empty($correct_answer) ? reset($correct_answer)['value'] : 'N/A';
                        ?>
                    </td>
                    <td>
                        <?php
                        $user_answer = isset($answers[$index]) ? $answers[$index] : 'N/A';
                        $user_answer_text = array_filter($question['options'], function($option) use ($user_answer) {
                            return $option['key'] === $user_answer;
                        });
                        echo !empty($user_answer_text) ? reset($user_answer_text)['value'] : 'N/A';
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if ($show_confetti): ?>
    <canvas id="confetti-canvas"></canvas>
    <script>
    var confettiSettings = {
        target: 'confetti-canvas'
    };
    var confetti = new ConfettiGenerator(confettiSettings);
    confetti.render();
    </script>
    <?php endif; ?>
</section>
</body>
</html>
