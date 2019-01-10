
<div class="container mt-5">
	<a class= "btn btn-outline-dark"  href="/admin">
        Admin home
    </a>
    <a class= "{{ ($active === 'teachers')? 'btn btn-primary kdg' : 'btn btn-outline-dark '  }}"  href="/admin/teachers">
        Teachers
    </a>
    <a class="{{ ($active === 'students')? 'btn btn-primary kdg' : 'btn btn-outline-dark'  }}" href="/admin/students">
        Students
    </a>
    <a class="{{ ($active === 'courses')? 'btn btn-primary kdg' : 'btn btn-outline-dark'  }}" href="/admin/courses">
        Courses
    </a>
</div>
