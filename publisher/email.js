const amqp = require('amqplib');
const nodemailer = require('nodemailer');

async function connectRabbitMQ() {
  try {
    const connection = await amqp.connect('amqp://localhost');
    const channel = await connection.createChannel();
    await channel.assertQueue('hello');

    console.log('Waiting for messages...');

    channel.consume(
      'hello',
      (msg) => {
        const emailContent = msg.content.toString();
        sendEmail(emailContent)
          .then(() => {
            console.log('Email sent successfully');
            channel.ack(msg);
          })
          .catch((error) => {
            console.error('Error occurred while sending email:', error);
          });
      },
      { noAck: false }
    );
  } catch (error) {
    console.error('RabbitMQ connection error:', error);
  }
}

async function sendEmail(emailContent) {
  const transporter = nodemailer.createTransport({
    service: 'Outlook',
    auth: {
      user: 'jualostaunaul@upt.pe',
      pass: 'dinoco/44/',
    },
    tls: {
        rejectUnauthorized: false
      }
  });

  const mailOptions = {
    from: 'jualostaunaul@upt.pe',
    to: 'rafvaldeza@upt.pe',
    subject: 'RabbitMQ Message',
    text: emailContent,
  };

  return transporter.sendMail(mailOptions);
}

connectRabbitMQ();