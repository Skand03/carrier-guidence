<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>Mitra.home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional custom CSS -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- <link href="Style.css" rel="stylesheet"> -->
    <style>
        :root {
    --primary-color: #4361ee;
    --secondary-color: #3f37c9;
    --accent-color: #4895ef;
    --light-color: #f8f9fa;
    --dark-color: #212529;
    --success-color: #2ecc71;
    --warning-color: #f39c12;
    --danger-color: #e74c3c;
    --info-color: #3498db;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    margin: 0;
    min-height: 100vh;
    line-height: 1.6;
    color: #333;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.app-header {
    background-color: white;
    padding: 20px;
    border-radius: 16px 16px 0 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    margin-top: 10px;
    text-align: center;
    border-bottom: 3px solid var(--accent-color);
}

.app-header h1 {
    color: var(--primary-color);
    margin-bottom: 10px;
    font-size: 32px;
}

.app-header p {
    color: #666;
    max-width: 800px;
    margin: 0 auto;
}

.main-content {
    background-color: white;
    padding: 30px;
    border-radius: 0 0 16px 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.nav-tabs {
    display: flex;
    border-bottom: 2px solid #eee;
    margin-bottom: 20px;
}

.nav-tab {
    padding: 12px 20px;
    cursor: pointer;
    font-weight: 600;
    color: #555;
    border-bottom: 3px solid transparent;
    margin-right: 10px;
    transition: all 0.3s;
}

.nav-tab.active {
    color: var(--primary-color);
    border-bottom-color: var(--primary-color);
}

.nav-tab:hover:not(.active) {
    border-bottom-color: #ddd;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

textarea,
input[type="text"] {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    transition: border-color 0.3s;
    margin-bottom: 15px;
}

textarea {
    height: 150px;
    resize: vertical;
}

textarea:focus,
input[type="text"]:focus {
    border-color: var(--accent-color);
    outline: none;
    box-shadow: 0 0 0 3px rgba(72, 149, 239, 0.2);
}

.btn {
    padding: 12px 24px;
    font-size: 16px;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-primary {
    background-color: var(--primary-color);
}

.btn-primary:hover {
    background-color: var(--secondary-color);
}

.btn-info {
    background-color: var(--info-color);
}

.btn-info:hover {
    background-color: #2980b9;
}

.btn-block {
    display: block;
    width: 100%;
}

.examples {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 15px 0;
}

.example-tag {
    background-color: #e9ecef;
    color: #495057;
    padding: 8px 15px;
    border-radius: 30px;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s;
}

.example-tag:hover {
    background-color: #dee2e6;
    transform: translateY(-2px);
}

.college-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
    transition: transform 0.3s, box-shadow 0.3s;
    overflow: hidden;
}

.college-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.college-header {
    padding: 20px;
    background: linear-gradient(to right, var(--primary-color), var(--accent-color));
    color: white;
}

.college-header h3 {
    margin: 0;
    font-size: 20px;
}

.college-body {
    padding: 20px;
}

.college-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 15px;
}

.college-badge {
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.tier-1 {
    background-color: #4caf50;
    color: white;
}

.tier-2 {
    background-color: #2196f3;
    color: white;
}

.tier-3 {
    background-color: #ff9800;
    color: white;
}

.govt {
    background-color: #9c27b0;
    color: white;
}

.private {
    background-color: #607d8b;
    color: white;
}

.college-rating {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.stars {
    color: #ffc107;
    font-size: 18px;
    margin-right: 10px;
}

.specialization-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 15px;
}

.pill {
    background-color: #f1f1f1;
    color: #333;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 12px;
}

.college-details {
    margin-top: 20px;
}

.info-section {
    margin-bottom: 15px;
}

.info-section h4 {
    margin-bottom: 5px;
    color: var(--primary-color);
}

.pros-cons {
    display: flex;
    gap: 20px;
    margin-top: 15px;
}

.pros,
.cons {
    flex: 1;
}

.pros h5,
.cons h5 {
    margin-bottom: 10px;
}

.pros ul,
.cons ul {
    padding-left: 20px;
}

.pros h5 {
    color: var(--success-color);
}

.cons h5 {
    color: var(--danger-color);
}

.detail-card {
    background: white;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.detail-header {
    text-align: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.detail-header h2 {
    color: var(--primary-color);
    margin-bottom: 10px;
}

.detail-section {
    margin-bottom: 30px;
}

.detail-section h3 {
    color: var(--primary-color);
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    margin-bottom: 20px;
}

.back-link:hover {
    text-decoration: underline;
}

.loading {
    text-align: center;
    margin: 30px 0;
}

.spinner {
    display: inline-block;
    width: 50px;
    height: 50px;
    border: 5px solid rgba(67, 97, 238, 0.3);
    border-radius: 50%;
    border-top-color: var(--primary-color);
    animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

.error {
    background-color: #ffebee;
    color: #c62828;
    padding: 15px;
    border-radius: 8px;
    margin: 20px 0;
    border-left: 5px solid #c62828;
}

.response {
    margin-top: 30px;
    background: #f8f9ff;
    padding: 25px;
    border-radius: 12px;
    border-left: 5px solid var(--accent-color);
}

.response h3 {
    color: var(--primary-color);
    margin-top: 0;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #e0e0e0;
}

.response-content {
    line-height: 1.8;
}

.features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.feature-card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.feature-icon {
    font-size: 40px;
    color: var(--primary-color);
    margin-bottom: 15px;
}

.feature-card h3 {
    color: var(--dark-color);
    margin-bottom: 10px;
}

.feature-card p {
    color: #666;
}

.footer {
    text-align: center;
    padding: 20px;
    color: #6c757d;
    font-size: 14px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .container {
        padding: 10px;
    }

    .app-header,
    .main-content {
        padding: 20px;
    }

    .nav-tabs {
        flex-wrap: wrap;
    }

    .nav-tab {
        padding: 10px 15px;
    }

    .pros-cons {
        flex-direction: column;
    }
}

/* Animation classes */
.fade-in {
    animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}

body.loading::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(255, 255, 255, 0.8);
    z-index: 9999;
}

body.loading::after {
    content: "";
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    border: 6px solid rgba(67, 97, 238, 0.3);
    border-top-color: var(--primary-color);
    border-radius: 50%;
    animation: spin 1s ease-in-out infinite;
    z-index: 10000;
}

    </style>
</head>
<body class="bg-light">
    <?php include 'navbar.php'; ?>
    <div class="container py-4">
<?php
require_once 'assets\parsedown-1.7.4\Parsedown.php';
$apiKey = getenv('GEMINI_API_KEY') ?: 'AIzaSyDJAfJpPDVNQwOdLFijSr5GgSAIlSsEuUQ'; // Uses env var, falls back to yours for local testing
$answer = "";
$errorMessage = "";
$isLoading = false;
$collegeDetails = [];
$showCollegeSearch = false;
$collegeSearchResults = [];

// Handle different types of requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['question'])) {
        // Career guidance question
        $isLoading = true;
        $userQuestion = trim($_POST['question']);
        
        // Enhanced prompt for comprehensive career guidance across all fields
        $prompt = "You are CareerGuide AI, an expert career counselor with extensive knowledge of all educational streams, career paths, job markets, and professional development across all fields.

The student asked: \"$userQuestion\"

Provide a comprehensive guidance that includes:
1. Direct answers to their career question, regardless of stream (Science, Commerce, Arts, etc.)
2. Relevant skills they should develop for this career path
3. Education or training paths to consider with course recommendations
4. Potential job roles, salary ranges, and growth opportunities
5. List of recommended college types they should consider (mention Tier-1, Tier-2, Tier-3, Government, and Private options)
6. Key entrance exams or application requirements if applicable

Format your response with clear headings and bullet points. Be detailed but concise.";

        try {
            $data = [
                "contents" => [[
                    "parts" => [[
                        "text" => $prompt
                    ]]
                ]]
            ];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key=$apiKey");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Add timeout
            
            $response = curl_exec($ch);
            
            if (curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }
            
            curl_close($ch);
            $responseData = json_decode($response, true);
            
            if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
                $answer = $responseData['candidates'][0]['content']['parts'][0]['text'];
            } else {
                $apiError = isset($responseData['error']['message']) ? $responseData['error']['message'] : "API response format was unexpected";
                throw new Exception("API Error: " . $apiError);
            }
        } catch (Exception $e) {
            $errorMessage = "Error: " . $e->getMessage();
        }
        
        $isLoading = false;
    } elseif (isset($_POST['college_search'])) {
        // College search functionality
        $searchQuery = trim($_POST['college_search']);
        $showCollegeSearch = true;
        
        $collegePrompt = "The student is searching for college information about: \"$searchQuery\"
        
Provide detailed information about colleges matching this query. For each college (limit to 5 most relevant), include:
1. Full college name
2. Location
3. Tier (Tier-1, Tier-2, or Tier-3)
4. Type (Government or Private)
5. Rating on a scale of 1-5
6. Notable departments or specializations
7. Admission process
8. Average fee structure
9. Placement statistics
10. Pros and cons

Format as JSON for easier parsing. Example format:
[
  {
    \"name\": \"College Name\",
    \"location\": \"City, State\",
    \"tier\": \"Tier-1/2/3\",
    \"type\": \"Government/Private\",
    \"rating\": 4.5,
    \"specializations\": [\"Spec1\", \"Spec2\"],
    \"admission\": \"Entrance exam details\",
    \"fees\": \"₹XX,XXX - ₹X,XX,XXX per year\",
    \"placement\": \"XX% with avg package of ₹X,XX,XXX\",
    \"pros\": [\"Pro1\", \"Pro2\"],
    \"cons\": [\"Con1\", \"Con2\"]
  }
]";

        try {
            $data = [
                "contents" => [[
                    "parts" => [[
                        "text" => $collegePrompt
                    ]]
                ]]
];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key=$apiKey");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            
            $response = curl_exec($ch);
            
            if (curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }
            
            curl_close($ch);
            $responseData = json_decode($response, true);
            
            if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
                $jsonText = $responseData['candidates'][0]['content']['parts'][0]['text'];
                
                // Extract JSON from the response (in case there's text before or after the JSON)
                preg_match('/\[\s*\{.*\}\s*\]/s', $jsonText, $matches);
                if (!empty($matches)) {
                    $jsonText = $matches[0];
                }
                
                $collegeSearchResults = json_decode($jsonText, true);
                
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new Exception("Failed to parse college data as JSON");
                }
            } else {
                $apiError = isset($responseData['error']['message']) ? $responseData['error']['message'] : "API response format was unexpected";
                throw new Exception("API Error: " . $apiError);
            }
        } catch (Exception $e) {
            $errorMessage = "College Search Error: " . $e->getMessage();
        }
    } elseif (isset($_POST['college_details'])) {
        // Single college detailed view
        $collegeName = $_POST['college_details'];
        
        $collegeDetailPrompt = "Provide extremely detailed information about \"$collegeName\" college/university including:
        
1. Full history and establishment details
2. Campus and infrastructure details
3. All departments and courses offered with eligibility criteria
4. Faculty strength and quality
5. Research output and notable achievements
6. Complete fee structure for different programs
7. Scholarship opportunities
8. Detailed placement statistics by department
9. Notable alumni
10. Ranking in various national and international lists
11. Student life and extracurricular activities
12. Hostel and accommodation facilities
13. Pros and cons of studying here

Provide comprehensive information that would help a student make an informed decision.";

        try {
            $data = [
                "contents" => [[
                    "parts" => [[
                        "text" => $collegeDetailPrompt
                    ]]
                ]]
];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key=$apiKey");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            
            $response = curl_exec($ch);
            
            if (curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }
            
            curl_close($ch);
            $responseData = json_decode($response, true);
            
            if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
                $collegeDetails = [
                    'name' => $collegeName,
                    'details' => $responseData['candidates'][0]['content']['parts'][0]['text']
                ];
            } else {
                $apiError = isset($responseData['error']['message']) ? $responseData['error']['message'] : "API response format was unexpected";
                throw new Exception("API Error: " . $apiError);
            }
        } catch (Exception $e) {
            $errorMessage = "College Details Error: " . $e->getMessage();
        }
    }
}
?>

    <div class="container">
        <div class="app-header">
                        <div class="app-header text-center mb-4">
                <?php
                require_once 'database.php'; // Include the database connection file
            
                // Default name if not logged in
                $userName = "Guest";
            
                // Check if the user is logged in
                if (isset($_SESSION['user_id'])) {
                    $userId = $_SESSION['user_id'];
            
                    // Fetch the user's name from the database
                    $stmt = $conn->prepare("SELECT name FROM users WHERE id = ?");
                    $stmt->bind_param("i", $userId);
                    $stmt->execute();
                    $stmt->bind_result($name);
                    if ($stmt->fetch()) {
                        $userName = $name; // Set the user's name
                    }
                    $stmt->close();
                }
                ?>
                <h1><i class="fas fa-graduation-cap"></i> Welcome <?php echo htmlspecialchars($userName); ?> to Mitra</h1>
            </div>
            <!-- <h1><i class="fas fa-graduation-cap"></i> Mitra</h1> -->
            <p>Your comprehensive AI-powered career and college guidance system to help navigate your educational and professional journey</p>
        </div>
        
        <div class="main-content">
            <?php if (!empty($collegeDetails)): ?>
                <!-- College Detailed View -->
                <a href="javascript:history.back()" class="back-link"><i class="fas fa-arrow-left"></i> Back to Results</a>
                
                <div class="detail-card fade-in">
                    <div class="detail-header">
                        <h2><?php echo htmlspecialchars($collegeDetails['name']); ?></h2>
                    </div>
                    
                    <div class="detail-content">
                        <?php echo nl2br(htmlspecialchars($collegeDetails['details'])); ?>
                    </div>
                </div>
                
            <?php elseif ($showCollegeSearch && !empty($collegeSearchResults)): ?>
                <!-- College Search Results -->
                <a href="javascript:history.back()" class="back-link"><i class="fas fa-arrow-left"></i> Back to Career Guidance</a>
                
                <h2 class="mb-4">College Search Results</h2>
                
                <?php foreach ($collegeSearchResults as $college): ?>
                    <div class="college-card fade-in">
                        <div class="college-header">
                            <h3><?php echo htmlspecialchars($college['name']); ?></h3>
                            <p><?php echo htmlspecialchars($college['location']); ?></p>
                        </div>
                        
                        <div class="college-body">
                            <div class="college-meta">
                                <?php 
                                $tierClass = strtolower(str_replace('-', '-', $college['tier'])); 
                                $typeClass = strtolower($college['type']);
                                ?>
                                <span class="college-badge <?php echo $tierClass; ?>"><?php echo htmlspecialchars($college['tier']); ?></span>
                                <span class="college-badge <?php echo $typeClass; ?>"><?php echo htmlspecialchars($college['type']); ?></span>
                            </div>
                            
                            <div class="college-rating">
                                <div class="stars">
                                    <?php 
                                    $rating = $college['rating'];
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo '<i class="fas fa-star"></i>';
                                        } elseif ($i - 0.5 <= $rating) {
                                            echo '<i class="fas fa-star-half-alt"></i>';
                                        } else {
                                            echo '<i class="far fa-star"></i>';
                                        }
                                    }
                                    ?>
                                </div>
                                <span><?php echo $rating; ?>/5.0</span>
                            </div>
                            
                            <div class="specialization-pills">
                                <?php foreach ($college['specializations'] as $spec): ?>
                                    <span class="pill"><?php echo htmlspecialchars($spec); ?></span>
                                <?php endforeach; ?>
                            </div>
                            
                            <div class="college-details">
                                <div class="info-section">
                                    <h4><i class="fas fa-user-graduate"></i> Admission Process</h4>
                                    <p><?php echo htmlspecialchars($college['admission']); ?></p>
                                </div>
                                
                                <div class="info-section">
                                    <h4><i class="fas fa-rupee-sign"></i> Fee Structure</h4>
                                    <p><?php echo htmlspecialchars($college['fees']); ?></p>
                                </div>
                                
                                <div class="info-section">
                                    <h4><i class="fas fa-briefcase"></i> Placement</h4>
                                    <p><?php echo htmlspecialchars($college['placement']); ?></p>
                                </div>
                                
                                <div class="pros-cons">
                                    <div class="pros">
                                        <h5><i class="fas fa-plus-circle"></i> Pros</h5>
                                        <ul>
                                            <?php foreach ($college['pros'] as $pro): ?>
                                                <li><?php echo htmlspecialchars($pro); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    
                                    <div class="cons">
                                        <h5><i class="fas fa-minus-circle"></i> Cons</h5>
                                        <ul>
                                            <?php foreach ($college['cons'] as $con): ?>
                                                <li><?php echo htmlspecialchars($con); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                
                                <form method="POST" style="margin-top: 20px;">
                                    <input type="hidden" name="college_details" value="<?php echo htmlspecialchars($college['name']); ?>">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fas fa-info-circle"></i> View Complete College Details
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            <?php else: ?>
                <!-- Tabs Section -->
                <div class="nav-tabs">
                    <div class="nav-tab active" data-tab="career-guidance">
                        <i class="fas fa-compass"></i> Career Guidance
                    </div>
                    <div class="nav-tab" data-tab="college-search">
                        <i class="fas fa-university"></i> College Search
                    </div>
                    <div class="nav-tab" data-tab="about">
                        <i class="fas fa-info-circle"></i> About
                    </div>
                </div>
                
                <!-- Career Guidance Tab Content -->
                <div class="tab-content active" id="career-guidance">
                    <h2><i class="fas fa-lightbulb"></i> Ask for Career Guidance</h2>
                    <p>Get personalized career recommendations based on your interests, skills, and educational background.</p>
                    
                    <form method="POST">
                        <label for="career-question"><i class="fas fa-question-circle"></i> What would you like guidance on?</label>
                        <div class="examples">
                            <span class="example-tag" onclick="fillExample('career-question', 'What are the best career options in Artificial Intelligence?')">AI career options</span>
                            <span class="example-tag" onclick="fillExample('career-question', 'How can I become a Data Scientist?')">Data Scientist path</span>
                            <span class="example-tag" onclick="fillExample('career-question', 'What are the top skills for a career in Cybersecurity?')">Cybersecurity skills</span>
                            <span class="example-tag" onclick="fillExample('career-question', 'After 12th Commerce career options')">After 12th Commerce</span>
                            <span class="example-tag" onclick="fillExample('career-question', 'How to become a pilot?')">Pilot career</span>
                        </div>
                        <textarea name="question" id="career-question" required placeholder="e.g., Which careers match my interest in mathematics and problem-solving?"></textarea>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-search"></i> Get Personalized Guidance
                        </button>
                    </form>
                    
                    <?php if ($isLoading): ?>
                        <div class="loading">
                            <div class="spinner"></div>
                            <p>Loading your personalized guidance...</p>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($errorMessage): ?>
                        <div class="error">
                            <strong><i class="fas fa-exclamation-triangle"></i> Error:</strong> 
                            <?php echo htmlspecialchars($errorMessage); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($answer): ?>
                        <div class="response fade-in">
                            <h3><i class="fas fa-robot"></i> Career Guidance Result</h3>
                            <div class="response-content">
                                <?php
                                $Parsedown = new Parsedown();
                                echo $Parsedown->text($answer);
                                ?>
                            </div>
                            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
                                <h4><i class="fas fa-university"></i> Looking for colleges?</h4>
                                <p>Now that you have career guidance, find the best colleges for your chosen path.</p>
                                <button onclick="switchToCollegeTab()" class="btn btn-info" style="margin-top: 10px;">
                                    <i class="fas fa-search"></i> Search for Colleges
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- College Search Tab Content -->
                <div class="tab-content" id="college-search">
                    <h2><i class="fas fa-university"></i> Find the Perfect College</h2>
                    <p>Search for colleges based on your preferences, field of study, location, or specific names.</p>
                    
                    <form method="POST">
                        <label for="college-search-input"><i class="fas fa-search"></i> Search for Colleges</label>
                        <div class="examples">
                            <span class="example-tag" onclick="fillExample('college-search-input', 'Top engineering colleges in India')">Engineering</span>
                            <span class="example-tag" onclick="fillExample('college-search-input', 'Best medical colleges in Mumbai')">Medical</span>
                            <span class="example-tag" onclick="fillExample('college-search-input', 'Top MBA colleges in Delhi')">MBA</span>
                            <span class="example-tag" onclick="fillExample('college-search-input', 'Best arts and science colleges')">Arts & Science</span>
                        </div>
                        <input type="text" name="college_search" id="college-search-input" required placeholder="e.g., IIT Delhi, Top MBA colleges, Best colleges for Psychology...">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-search"></i> Search Colleges
                        </button>
                    </form>
                </div>
                
                <!-- About Tab Content -->
                <div class="tab-content" id="about">
                    <h2><i class="fas fa-info-circle"></i> About Mitra</h2>
                    <p>Mitra is your comprehensive AI-powered guidance system designed to help students make informed decisions.</p>
                    
                    <div class="features">
                        <div class="feature-card">
                            <div class="feature-icon"><i class="fas fa-compass"></i></div>
                            <h3>Career Guidance</h3>
                            <p>Get personalized recommendations based on your interests and skills.</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon"><i class="fas fa-university"></i></div>
                            <h3>College Search</h3>
                            <p>Find the perfect institution with detailed ratings and insights.</p>
                        </div>
                        <div class="feature-card">
                            <div class="feature-icon"><i class="fas fa-graduation-cap"></i></div>
                            <h3>Pathways</h3>
                            <p>Clear guidance on courses, exams, and educational requirements.</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="footer">
            <p>Mitra &copy; <?php echo date('Y'); ?> | Your AI-powered Career and College Guidance System</p>
        </div>
    </div>
    
    <script>
        document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", () => {
        document.body.classList.add("loading");
    });
});

    // Tab switching functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.nav-tab');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));
                
                // Add active class to clicked tab
                tab.classList.add('active');
                
                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                // Show the corresponding tab content
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
    });
    
    // Fill example text in input fields
    function fillExample(inputId, text) {
        document.getElementById(inputId).value = text;
    }
    
    // Switch to college search tab
   function switchToCollegeTab() {
    const tab = document.querySelector('[data-tab=college-search]');
    tab.click();
    window.scrollTo({ top: tab.offsetTop, behavior: 'smooth' });
}

    </script>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>