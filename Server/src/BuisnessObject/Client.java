package BuisnessObject;

import java.io.IOException;
import java.io.OutputStream;
import java.io.PrintWriter;
import java.net.Socket;
import java.util.Scanner;

/**
 *
 * @author Administrator
 */
public class Client {

    public static void main(String[] args) {
        Client client = new Client();
        client.start();
    }

    public void start() {
        try
        {
            Scanner in = new Scanner(System.in);
            Socket socket = new Socket("localhost", 8080);

            System.out.println("Client: This Client is running and has connected to the server");
            boolean ClientRun = true;
            boolean dontPrintReturn;
            while (ClientRun)
            {
                OutputStream os = socket.getOutputStream();                     //To server
                PrintWriter socketWriter = new PrintWriter(os, true);
                socketWriter.println("hello server java");
                System.out.println("sent to server");
                
                Scanner socketReader = new Scanner(socket.getInputStream());            //creates the socket reader to recieve the return from the server    
                String returnedString = socketReader.nextLine();
                System.out.println(returnedString+ " recieved from server");
                socket.close();
            }
        } catch (IOException e)
        {
            System.out.println("Client message: IOException: " + e);
        }
    }

}
