import asyncio
import json
from azure.servicebus.aio import ServiceBusClient

NAMESPACE_CONNECTION_STR = "YOUR_CONNECTION_STRING"
SUBSCRIPTION_NAME = "YOUR_SUBSCRIPTION_NAME"
TOPIC_NAME = "YOUR_TOPIC_NAME"

async def run():
    servicebus_client = ServiceBusClient.from_connection_string(conn_str=NAMESPACE_CONNECTION_STR, logging_enable=True)
    async with servicebus_client:
        receiver = servicebus_client.get_subscription_receiver(topic_name=TOPIC_NAME, subscription_name=SUBSCRIPTION_NAME, max_wait_time=5)
        async with receiver:
            received_msgs = await receiver.receive_messages(max_wait_time=5, max_message_count=20)
            messages = []
            for msg in received_msgs:
                messages.append(str(msg))
            print(json.dumps(messages))

asyncio.run(run())