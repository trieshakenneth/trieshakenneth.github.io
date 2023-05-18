<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<!DOCTYPE html>
<html>
<head>
  <title>Login Result</title>
</head>
<body>
  <% 
    String username = request.getParameter("username");
    String password = request.getParameter("password");
    String email = request.getParameter("email");
    String phone = request.getParameter("phone");
    
    // Perform login authentication logic
    if (username.equals("admin") && password.equals("password")) {
      out.println("<h1>Login Successful</h1>");
      out.println("<p>Welcome, " + username + "!</p>");
      out.println("<p>Email: " + email + "</p>");
      out.println("<p>Phone: " + phone + "</p>");
    } else {
      out.println("<h1>Login Failed</h1>");
      out.println("<p>Invalid username or password. Please try again.</p>");
    }
  %>
</body>
</html>
