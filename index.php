<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>📅 Course Calendar <br/> My Calendar Project</h1>
    </header>

    <!-- clock -->
    <div class="calendar">
        <div class="clock"></div>
    </div>

    <!-- Calendar Selection -->
    <div>
        <div class="calendar">
            <div class="nav-btn-container">
                <button class="nav-btn">⏪</button>
                <h2 id="monthYear" style="margin: 0;"></h2>
                <button class="nav-btn">⏩</button>
            </div>
        </div>

        <div class="clendar-grid" id="calendar"></div>
    </div>

    <!-- Modal for Add/Edit/Delete Appointment -->
    <div id="eventSelectionWrapper">
        <label for="eventSelector">
            <strong>Select Event: </strong>
        </label>
        <select id="eventSelector">
            <option value="" disabled selected>Choose Event...</option>
        </select>
    </div>

    <!-- Main Form -->
    <form action="" method="post" id="eventForm">
        <input type="hidden" name="action" id="formAction" value="add" />
        <input type="hidden" name="event_id" id="eventId" />

        <label for="courseName">Course Title</label>
        <input type="text" name="course_name" id="courseName" required />

        <label for="instructorName">Instructor Name:</label>
        <input type="text" name="instructor_name" id="instructorName" required />

        <label for="startDate">Start Date:</label>
        <input type="date" name="start_date" id="startDate" required />

        <label for="endDate">End Date:</label>
        <input type="date" name="end_date" id="endDate" required />

        <button type="submit">Save</button>
    </form>

    <!-- Delete Form -->
    <form action="post" onsubmit="return confirm('Are you sure you want to delete this appointment?')">
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" name="event_id" id="deleteEventId" />
        <button type="submit" class="submit-btn">🗑️ Delete</button>
    </form>

    <!-- ❌ Cancel -->
    <button type="button" class="submit-btn">❌ Cancel</button>
</body>
</html>