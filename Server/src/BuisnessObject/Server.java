package BuisnessObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;

/**
 *
 * @author Administrator
 */
public class Server {

    public static void main(String[] args) {
        Server server = new Server();
        server.start();
    }

    public void start() {
        try
        {
            ServerSocket ss = new ServerSocket(8080);//set port

            System.out.println("Server: Server started. Listening for connections on port 8080...");

            int clientNumber = 0;  //client no

            while (true)  //new client loop
            {
                Socket socket = ss.accept();   //wait for connection
                //client numbering
                clientNumber++;

                System.out.println("Server: Client " + clientNumber + " has connected.");

                System.out.println("Server: Port# of remote client: " + socket.getPort());
                System.out.println("Server: Port# of this server: " + socket.getLocalPort());

                Thread t = new Thread(new ClientHandler(socket, clientNumber)); //new client handler for each client
                t.start();

                System.out.println("Server: ClientHandler started in thread for client " + clientNumber + ". ");
                System.out.println("Server: Listening for further connections...");
            }
        } catch (IOException e)
        {
            System.out.println("Server: IOException: " + e);
        }
        System.out.println("Server: Server exiting, Goodbye!");
    }

    public class ClientHandler implements Runnable // each ClientHandler communicates with one Client
    {

        BufferedReader socketReader;
        PrintWriter socketWriter;
        Socket socket;
        int clientNumber;

        public ClientHandler(Socket clientSocket, int clientNumber) {
            try
            {
                InputStreamReader isReader = new InputStreamReader(clientSocket.getInputStream());
                this.socketReader = new BufferedReader(isReader);

                OutputStream os = clientSocket.getOutputStream();
                this.socketWriter = new PrintWriter(os, true); // true => auto flush socket buffer

                this.clientNumber = clientNumber;  // ID number that we are assigning to this client

                this.socket = clientSocket;  // store socket ref for closing
            } catch (IOException ex)
            {
                ex.printStackTrace();
            }
        }

        @Override
        public void run() {
            String message;
            Boolean socketClose = false;
            try
            {
                while ((message = socketReader.readLine()) != null)
                {
                    System.out.println(message);
                    socketWriter.flush();
                    socketWriter.println(message+"\r\n");
                    System.out.println("printed to client");
                }
                if (socketClose)
                {
                    socket.close();
                }

            } catch (IOException ex)
            {
                System.out.println(ex);
            }
            System.out.println("Server: (ClientHandler): Handler for Client " + clientNumber + " is terminating .....");
        }
    }
}
