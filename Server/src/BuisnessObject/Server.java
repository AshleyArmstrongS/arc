package BuisnessObject;

import DAOs.JSONFormattingInterface;
import DAOs.PsqlUserDao;
import DTOs.User;
import DTOs.Driver;
import Exceptions.DaoException;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.PrintWriter;
import java.io.StringReader;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.json.Json;
import javax.json.JsonObject;
import javax.json.JsonReader;
import DAOs.UserDaoInterface;

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

        static final String CRLF = "/r/n";
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

                    System.out.println("***************************************\n");
                    System.out.println(message);
                    System.out.println("***************************************\n");
                    UserDaoInterface IUserDao = new PsqlUserDao();
                    JSONFormattingInterface IJSONDao = new User();
                    JsonObject fromClient = jsonFromString(message);
                    String clientReq = fromClient.getString("request");
                    String clientResponse = "{\"type\" : \"status\", \"status\" : \"001\"}";
                    socketWriter.flush();

                    if (clientReq == "login")
                    {
                        clientResponse = login(IUserDao, fromClient);
                    }
                    else if (clientReq == "register")
                    {

                    }
                    else
                    {
                        socketWriter.println(returnAllUsers(IUserDao, IJSONDao) + CRLF);
                    }
                    socketWriter.write(clientResponse);
                    System.out.println("printed to client");

                }
                if (socketClose)
                {
                    socket.close();
                }

            } catch (IOException ex)
            {
                System.out.println(ex);
            } catch (DaoException ex)
            {
                Logger.getLogger(Server.class.getName()).log(Level.SEVERE, null, ex);
            }
            System.out.println("Server: (ClientHandler): Handler for Client " + clientNumber + " is terminating .....");
        }
    }

    public static JsonObject jsonFromString(String jsonObjectStr) {
        JsonObject object;
        try (JsonReader jsonReader = Json.createReader(new StringReader(jsonObjectStr)))
        {
            object = jsonReader.readObject();
        }

        return object;
    }

    public static String returnAllUsers(UserDaoInterface IUserDao, JSONFormattingInterface IJSONDao) throws DaoException {
        //ArrayList<User> users = IUserDao.returnNonDrivers();
        // if(users != null){
        // return IJSONDao.jsonFormatter(users);
        // }
        // else
        //{
        return "{\"type\": \"message\", \"message\": \"Something went wrong! Try Again later\"}";
        //}
    }

    public static String login(UserDaoInterface IUserDao, JsonObject fromClient) throws DaoException {
        String email = fromClient.getString("email");
        String password = IUserDao.getHashByEmail(email);
        if (password != "")
        {
            return "{\"type\":\"login\", \"password\":\"" + password + "\"}";
        }
        else
        {
            return "{\"type\": \"message\",\"message\": \"Something went wrong! Try Again later\"}";
        }
    }

    public static String createUser(UserDaoInterface IUserDao, JsonObject fromClient) throws DaoException {
        User register = new User(
                fromClient.getString("name"),
                fromClient.getInt("age"),
                fromClient.getString("gender").charAt(0),
                fromClient.getString("email"),
                fromClient.getString("password"),
                fromClient.getString("college"),
                fromClient.getString("description"),
                fromClient.getString("user_type").charAt(0),
                fromClient.getInt("location_id")
        );
        IUserDao.addUser(register);
        if(register.getEmail().equals(fromClient.getString("email"))){
            return "{\"type\": \"RegisterSuccess\"}";
        }
        else{
             return "{\"type\": \"message\",\"message\": \"Something went wrong! Try Again later\"}";
        }
            
    }
}
