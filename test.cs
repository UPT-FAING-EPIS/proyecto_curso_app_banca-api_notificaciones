using RabbitMQ.Client;
using RabbitMQ.Client.Events;
using System;
using System.Text;

class Program
{
    static void Main()
    {
        // Configuración de conexión a RabbitMQ
        var factory = new ConnectionFactory()
        {
            HostName = "http://localhost:15672",
            UserName = "guest",
            Password = "guest"
        };
        using (var connection = factory.CreateConnection())
        using (var channel = connection.CreateModel())
        {
            // Creación de la cola de notificaciones
            channel.QueueDeclare(queue: "notificaciones", durable: false, exclusive: false, autoDelete: false, arguments: null);

            // Configuración del consumidor para recibir notificaciones
            var consumer = new EventingBasicConsumer(channel);
            consumer.Received += (model, ea) =>
            {
                var body = ea.Body.ToArray();
                var message = Encoding.UTF8.GetString(body);
                Console.WriteLine("Notificación recibida: {0}", message);
            };
            channel.BasicConsume(queue: "notificaciones", autoAck: true, consumer: consumer);

            Console.WriteLine("Esperando notificaciones...");
            Console.ReadLine();
        }
    }

    // Función para enviar una notificación
    static void EnviarNotificacion(string mensaje)
    {
        var factory = new ConnectionFactory()
        {
            HostName = "http://localhost:15672",
            UserName = "guest",
            Password = "guest"
        };
        using (var connection = factory.CreateConnection())
        using (var channel = connection.CreateModel())
        {
            // Publicar mensaje en la cola de notificaciones
            var body = Encoding.UTF8.GetBytes(mensaje);
            channel.BasicPublish(exchange: "", routingKey: "notificaciones", basicProperties: null, body: body);
            Console.WriteLine("Notificación enviada: {0}", mensaje);
        }
    }
}