
import openai
openai.api_key = "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"

def chat_with_gpt(prompt):
    response = openai.chatcompletion.create()


