package galaxy;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class DeepThoughtServlet extends javax.servlet.http.HttpServlet {

    public void doGet(HttpServletRequest request,
                      HttpServletResponse response)
            throws IOException, ServletException {
        response.setContentType("text/html");
        java.io.PrintWriter out = response.getWriter();
        out.println("<html>");
        out.println("<head><title>Deep Thought Servlet</title></head>");
        out.println("<body><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">");
        out.println("<tr><td align=\"center\"><img src=\"img/Answer_to_Life.png \"/></td></tr></table>");
        out.println("</body></html>");
    }

}
